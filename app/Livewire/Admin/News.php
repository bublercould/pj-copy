<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\News as PostNews;

class News extends Component
{
    use WithPagination, WithFileUploads, LivewireAlert;

    public $search = "";
    public $postId, $name, $descript, $images, $original_image;

    public function submit()
    {
        $this->validateRequest();

        try {
            $image = $this->images->store('news');

            PostNews::create([
                'name' => $this->name,
                'detail' => $this->descript,
                'image' => $image,
            ]);

            $this->message('success', 'เพิ่มข้อมูลสำเร็จ');
        } catch (\Exception $e) {
            $this->message('error', 'เกิดข้อผิดพลาด: ' . $e->getMessage());
        }

        $this->dispatch('closeModal', id: 'addNews');
        $this->clear();
    }

    public function delete($id = null, $modalId = null)
    {
        try {
            $post = PostNews::find($id);

            if ($post) {
                $post->delete();
                $this->message('success', 'ลบข้อมูลสำเร็จ');
            } else {
                $this->message('error', 'ไม่มีข้อมูลชุดนี้, หรือ ถูกลบออกแล้ว');
            }
        } catch (\Exception $e) {
            $this->message('error', 'เกิดข้อผิดพลาด: ' . $e->getMessage());
        }

        $this->dispatch('closeModal', id: $modalId);
    }

    public function edit($id = null)
    {
        try {
            $post = PostNews::find($id);

            if ($post) {
                $this->fill([
                    'postId' => $post->id,
                    'name' => $post->name,
                    'descript' => $post->detail,
                    'original_image' => $post->image,
                ]);
            } else {
                $this->message('error', 'ไม่มีข้อมูลชุดนี้, หรือ ถูกลบออกแล้ว');
                $this->dispatch('closeModal', id: 'newsEdit');
            }
        } catch (\Exception $e) {
            $this->message('error', 'เกิดข้อผิดพลาด: ' . $e->getMessage());
            $this->dispatch('closeModal', id: 'newsEdit');
        }
    }

    public function update()
    {
        $this->validateRequest(true);

        try {
            $news_image = $this->images ? $this->images->store('news') : $this->original_image;

            PostNews::find($this->postId)->update([
                'name' => $this->name,
                'detail' => $this->descript,
                'image' => $news_image,
            ]);

            $this->message('success', 'แก้ไขข้อมูลสำเร็จ');
        } catch (\Exception $e) {
            $this->message('error', 'เกิดข้อผิดพลาด: ' . $e->getMessage());
        }

        $this->clear();
        $this->dispatch('closeModal', id: 'newsEdit');
    }

    protected function validateRequest($isUpdate = false)
    {
        $rules = [
            'name' => 'required|max:255',
            'descript' => 'required',
            'images' => $isUpdate ? 'nullable|image|max:10240' : 'required|image|max:10240'
        ];

        $messages = [
            'name.required' => 'โปรดกรอกหัวข้อ',
            'descript.required' => 'โปรดกรอกรายละเอียดข่าวสาร',
            'name.max' => 'หัวข้อยาวเกินไป',
            'images.required' => 'โปรดใส่รูปภาพ',
            'images.image' => 'ไม่รองรับไฟล์ที่คุณเลือก, ไฟล์ที่รองรับ jpg, jpeg, png, tiff, gif',
            'images.max' => 'ขนาดไฟล์ใหญ่เกิน 10MB',
        ];

        $this->validate($rules, $messages);
    }

    public function clear()
    {
        $this->reset(['name', 'descript', 'original_image', 'images', 'postId']);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function message($type, $message)
    {
        $this->alert($type, $message, ['toast' => false, 'position' => 'center']);
    }

    public function render()
    {
        $data = PostNews::query()
            ->when($this->search, fn($query) => $query->where('name', 'LIKE', "%{$this->search}%")->orWhere('detail', 'LIKE', "%{$this->search}%"))
            ->latest()
            ->paginate(10);

        return view('livewire.admin.news', ['postNews' => $data]);
    }
}
