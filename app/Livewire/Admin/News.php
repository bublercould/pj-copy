<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\Url;

use Illuminate\Database\Eloquent\Builder;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use App\Models\News as PostNews;

class News extends Component
{

    use WithPagination;
    use WithFileUploads;
    use WithoutUrlPagination;

    use LivewireAlert;

    public $search = "";

    public $postId;
    public $name;
    public $descript;
    public $images;
    public $original_image;

    public function submit()
    {

        $this->validate(
            [
                'name' => 'required|max:255',
                'descript' => 'required',
                'images' => 'required|image|max:10240'
            ],
            [
                'name.required' => 'โปรดกรอกหัวข้อ',
                'descript.required' => 'โปรดกรอกรายละเอียดข่าวสาร',
                'name.max' => 'หัวข้อยาวเกินไป',
                'images.required' => 'โปรดใส่รูปภาพ',
                'images.image' => 'ไม่รองรับไฟล์ที่คุณเลือก, ไฟล์ที่รองรับ jpg, jpeg, png, tiff, gif',
                'images.max' => 'ขนาดไฟล์ใหญ่เกิน 10MB',
            ]
        );

        $image = $this->images->store(path: 'news');

        $post = PostNews::create(
            [
                'name' => $this->name,
                'detail' => $this->descript,
                'image' => $image,
            ]
        );

        if ($post) {
            $this->message('success', 'เพิ่มข้อมูลสำเร็จ');
        } else {
            $this->message('error', 'เพิ่มข้อมูลไม่สำเร็จ');
        }

        $this->dispatch('closeModal', id: 'addNews');
        $this->clear();
    }

    public function delete($id = null, $modalId = null)
    {

        if (!empty($id)) {

            $post = PostNews::find($id);

            if (!empty($post->id)) {
                $post->delete();
                $this->message('success', 'ลบข้อมูลสำเร็จ');
            } else {
                $this->message('error', 'ไม่มีข้อมูลชุดนี้, หรือ ถูกลบออกแล้ว');
            }
        } else {
            $this->message('error', 'ไม่สามารถลบได้โปรดลองใหม่อีกครั้ง');
        }

        $this->dispatch('closeModal', id: $modalId);
    }

    public function edit($id = null)
    {

        if (!empty($id)) {

            $post = PostNews::find($id);

            if (!empty($post->id)) {

                $this->postId = $post->id;
                $this->name = $post->name;
                $this->descript = $post->detail;
                $this->original_image = $post->image;
            } else {
                $this->message('error', 'ไม่มีข้อมูลชุดนี้, หรือ ถูกลบออกแล้ว');
                $this->dispatch('closeModal', id: 'newsEdit');
            }
        } else {
            $this->message('error', 'โหลดข้อมูลไม่ได้');
            $this->dispatch('closeModal', id: 'newsEdit');
        }
    }

    public function update()
    {

        $this->validate(
            [
                'name' => 'required|max:255',
                'descript' => 'required',
                'images' => 'nullable|image|max:10240'
            ],
            [
                'name.required' => 'โปรดกรอกหัวข้อ',
                'descript.required' => 'โปรดกรอกรายละเอียดข่าวสาร',
                'name.max' => 'หัวข้อยาวเกินไป',
                'images.required' => 'โปรดใส่รูปภาพ',

            ]
        );

        if (!empty($this->images)) {
            $news_image = $this->images->store(path: 'news');
        }

        $post = PostNews::find($this->postId);

        $post->update(
            [
                'name' => $this->name,
                'detail' => $this->descript,
                'image' => !empty($news_image) ? $news_image : $this->original_image,
            ]
        );

        if ($post) {
            $this->message('success', 'แก้ไขข้อมูลสำเร็จ');
        } else {
            $this->message('error', 'แก้ไขข้อมูลไม่สำเร็จ');
        }

        $this->clear();
        $this->dispatch('closeModal', id: 'newsEdit');
    }

    public function clear()
    {

        $this->reset(
            'name',
            'descript',
            'original_image',
            'images',
            'postId',
        );

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function message($type, $message)
    {
        return $this->alert(
            $type,
            $message,
            [
                'toast' => false,
                'position' => 'center',
            ]
        );
    }

    public function render()
    {

        $search = $this->search;

        $data = PostNews::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('detail', 'LIKE', '%' . $search . '%');
                });
            })
            ->latest()
            ->paginate(10);

        return view(
            'livewire.admin.news',
            [
                'postNews' => $data,
            ]
        );
    }
}
