<?php

namespace App\Livewire\Admin;

use Jantinnerezo\LivewireAlert\LivewireAlert;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

use App\Models\Staff;

class About extends Component
{

    use WithFileUploads;
    use WithPagination;
    use WithoutUrlPagination;

    use LivewireAlert;

    public $search = "";

    public $staffId;
    public $name;
    public $position;
    public $image;
    public $original_image;

    public function submit()
    {

        $this->validate(
            [
                'name' => 'required|max:255',
                'position' => 'required|max:100',
                'image' => 'required|image|max:10240'
            ],
            [
                'name.required' => 'โปรดกรอก ชื่อ-นามสกุล',
                'name.max' => 'ชื่อ-นามสกุล ยาวเกินไป',
                'position.required' => 'โปรดกรอกตำแหน่งงาน',
                'position.max' => 'ตำแหน่งงาน ยาวเกินไป',
                'image.required' => 'โปรดใส่รูปภาพ',
                'image.image' => 'ไม่รองรับไฟล์ที่คุณเลือก, ไฟล์ที่รองรับ jpg, jpeg, png, tiff, gif',
                'image.max' => 'ขนาดไฟล์ใหญ่เกิน 10MB',
            ]
        );

        $image = $this->image->store(path: 'staff');

        $staff = Staff::create(
            [
                'name' => $this->name,
                'position' => $this->position,
                'image' => $image,
            ]
        );

        if($staff)
        {
            $this->message('success', 'เพิ่มข้อมูลสำเร็จ');
        }else{
            $this->message('error', 'เพิ่มข้อมูลไม่สำเร็จ');
        }

        $this->dispatch('closeModal', id:'addStaff');
        $this->clear();

    }

    public function delete($id=null, $modalId=null)
    {

        if(!empty($id))
        {

            $staff = Staff::find($id);

            if(!empty($staff->id))
            {
                $staff->delete();
                $this->message('success', 'ลบข้อมูลสำเร็จ');
            }else{
                $this->message('error', 'ไม่มีข้อมูลชุดนี้, หรือ ถูกลบออกแล้ว');
            }

        }else{
            $this->message('error', 'ไม่สามารถลบได้โปรดลองใหม่อีกครั้ง');
        }

        $this->dispatch('closeModal', id: $modalId);

    }

    public function edit($id=null)
    {

        if(!empty($id))
        {

            $post = Staff::find($id);

            if(!empty($post->id))
            {

                $this->staffId = $post->id;
                $this->name = $post->name;
                $this->position = $post->position;
                $this->original_image = $post->image;

            }else{
                $this->message('error', 'ไม่มีข้อมูลชุดนี้, หรือ ถูกลบออกแล้ว');
                $this->dispatch('closeModal', id:'staffEdit');
            }

        }else{
            $this->message('error', 'โหลดข้อมูลไม่ได้');
            $this->dispatch('closeModal', id:'staffEdit');
        }

    }

    public function update()
    {

        $this->validate(
            [
                'name' => 'required|max:255',
                'position' => 'required',
                'image' => 'nullable|image|max:102400'
            ],
            [
                'name.required' => 'โปรดกรอก ชื่อ-นามสกุล',
                'name.max' => 'ชื่อ-นามสกุล ยาวเกินไป',
                'position.required' => 'โปรดกรอกตำแหน่งงาน',
                'position.max' => 'ตำแหน่งงาน ยาวเกินไป',
                'image.required' => 'โปรดใส่รูปภาพ',
                'image.image' => 'ไม่รองรับไฟล์ที่คุณเลือก, ไฟล์ที่รองรับ jpg, jpeg, png, tiff, gif',
                'image.max' => 'ขนาดไฟล์ใหญ่เกิน 10MB',

            ]
        );

        if(!empty($this->image))
        {
            $news_image = $this->image->store(path: 'staff');
        }

        $staff = Staff::find($this->staffId);

        $staff->update(
            [
                'name' => $this->name,
                'position' => $this->position,
                'image' => !empty($news_image) ? $news_image : $this->original_image,
            ]
        );

        if($staff)
        {
            $this->message('success', 'แก้ไขข้อมูลสำเร็จ');
        }else{
            $this->message('error', 'แก้ไขข้อมูลไม่สำเร็จ');
        }

        $this->clear();
        $this->dispatch('closeModal', id:'staffEdit');

    }

    public function clear()
    {

        $this->reset(
            'name',
            'position',
            'original_image',
            'image',
            'staffId',
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

        $keyword = $this->search;
        $query = Staff::query();

        if(!empty($this->search))
        {
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%'.$keyword.'%')
                ->orWhere('position', 'LIKE', '%'.$keyword.'%');
            });
        }

        $result = $query->latest()->paginate(10);

        return view(
            'livewire.admin.about',
            [
                'staff' => $result,
            ]
        );

    }

}
