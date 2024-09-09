<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\Url;

use Illuminate\Database\Eloquent\Builder;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use App\Models\Activity as PostActivity;

class Activity extends Component
{
    use WithPagination;
    use WithFileUploads;
    use WithoutUrlPagination;
    use LivewireAlert;

    public $search = "";
    public $activityId;
    public $description;
    public $images;
    public $original_image;

    public function submit()
    {
        $this->validate(
            [
                'description' => 'required',
                'images' => 'required|image|max:10240'
            ],
            [
                'description.required' => 'โปรดกรอกรายละเอียดกิจกรรม',
                'images.required' => 'โปรดใส่รูปภาพ',
                'images.image' => 'ไม่รองรับไฟล์ที่คุณเลือก, ไฟล์ที่รองรับ jpg, jpeg, png, tiff, gif',
                'images.max' => 'ขนาดไฟล์ใหญ่เกิน 10MB',
            ]
        );

        $image = $this->images->store(path: 'activities');

        $activity = Activity::create(
            [
                'activity_id' => $this->activityId, // Assuming activity_id is a unique identifier
                'description' => $this->description,
                'image' => $image,
            ]
        );

        if ($activity) {
            $this->message('success', 'เพิ่มข้อมูลสำเร็จ');
        } else {
            $this->message('error', 'เพิ่มข้อมูลไม่สำเร็จ');
        }

        $this->dispatch('closeModal', id: 'addActivity');
        $this->clear();
    }

    public function delete($id = null, $modalId = null)
    {
        if (!empty($id)) {
            $activity = Activity::find($id);

            if (!empty($activity->id)) {
                $activity->delete();
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
            $activity = Activity::find($id);

            if (!empty($activity->id)) {
                $this->activityId = $activity->activity_id;
                $this->description = $activity->description;
                $this->original_image = $activity->image;
            } else {
                $this->message('error', 'ไม่มีข้อมูลชุดนี้, หรือ ถูกลบออกแล้ว');
                $this->dispatch('closeModal', id: 'activityEdit');
            }
        } else {
            $this->message('error', 'โหลดข้อมูลไม่ได้');
            $this->dispatch('closeModal', id: 'activityEdit');
        }
    }

    public function update()
    {
        $this->validate(
            [
                'description' => 'required',
                'images' => 'nullable|image|max:10240'
            ],
            [
                'description.required' => 'โปรดกรอกรายละเอียดกิจกรรม',
            ]
        );

        if (!empty($this->images)) {
            $activity_image = $this->images->store(path: 'activities');
        }

        $activity = Activity::find($this->activityId);

        $activity->update(
            [
                'description' => $this->description,
                'image' => !empty($activity_image) ? $activity_image : $this->original_image,
            ]
        );

        if ($activity) {
            $this->message('success', 'แก้ไขข้อมูลสำเร็จ');
        } else {
            $this->message('error', 'แก้ไขข้อมูลไม่สำเร็จ');
        }

        $this->clear();
        $this->dispatch('closeModal', id: 'activityEdit');
    }

    public function clear()
    {
        $this->reset(
            'description',
            'original_image',
            'images',
            'activityId',
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

        $data = PostActivity::query()
            ->when($search, function ($query) use ($search) {
                $query->where('description', 'LIKE', '%' . $search . '%');
            })
            ->latest()
            ->paginate(10);

        return view(
            'livewire.admin.activity',
            [
                'activities' => $data,
            ]
        );
    }
}
