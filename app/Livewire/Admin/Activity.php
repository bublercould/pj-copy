<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Activity as PostActivity;

class Activity extends Component
{
    use WithPagination, WithFileUploads, WithoutUrlPagination, LivewireAlert;

    public $search = "";
    public $activityId, $image, $description;

    protected $rules = [
        'image' => 'nullable|image|max:10240',
        'description' => 'required|string|max:255', 
    ];
    
    protected $messages = [
        'description.required' => 'โปรดกรอกรายละเอียดกิจกรรม',
        'image.image' => 'กรุณาอัปโหลดไฟล์รูปภาพเท่านั้น',
        'image.max' => 'ขนาดไฟล์รูปภาพต้องไม่เกิน 10MB',
    ];

    public function submit()
    {
        try {
            $this->validate();

            $image_path = null;
            if ($this->image) {
                $image_path = $this->image->store('activities', 'public');
            }

            $activity = PostActivity::create([
                'image' => $image_path,  
                'description' => $this->description,
            ]);

            $this->message('success', 'เพิ่มข้อมูลกิจกรรมสำเร็จ');
        } catch (\Exception $e) {
            $this->message('error', 'เพิ่มข้อมูลกิจกรรมไม่สำเร็จ: ' . $e->getMessage());
        } finally {
            $this->dispatch('closeModal', 'addActivity');
            $this->clear();
        }
    }

    public function delete($id = null, $modalId = null)
    {
        try {
            if ($id) {
                $activity = PostActivity::find($id);
                if ($activity) {
                    $activity->delete();
                    $this->message('success', 'ลบข้อมูลกิจกรรมสำเร็จ');
                } else {
                    $this->message('error', 'ไม่มีข้อมูลชุดนี้ หรือ ถูกลบออกแล้ว');
                }
            } else {
                $this->message('error', 'ไม่สามารถลบได้ โปรดลองใหม่อีกครั้ง');
            }
        } catch (\Exception $e) {
            $this->message('error', 'ไม่สามารถลบข้อมูลกิจกรรมได้: ' . $e->getMessage());
        } finally {
            $this->dispatch('closeModal', $modalId);
        }
    }

    public function edit($id = null)
    {
        try {
            if ($id) {
                $activity = PostActivity::find($id);
                if ($activity) {
                    $this->fill([
                        'activityId' => $activity->id, // ปรับให้ตรงกับ activity_id
                        'image' => $activity->image,
                        'description' => $activity->description
                    ]);
                } else {
                    throw new \Exception('ไม่มีข้อมูลชุดนี้ หรือ ถูกลบออกแล้ว');
                }
            } else {
                throw new \Exception('โหลดข้อมูลไม่ได้');
            }
        } catch (\Exception $e) {
            $this->message('error', $e->getMessage());
            $this->dispatch('closeModal', 'activityEdit');
        }
    }

    
    public function update()
    {
        try {
            $this->validate();

            $activity = PostActivity::find($this->activityId);
            if ($activity) {
                $image_path = $activity->image;  
                if ($this->image) {
                    $image_path = $this->image->store('activities', 'public');
                }

                $activity->update([
                    'image' => $image_path,
                    'description' => $this->description,
                ]);
                $this->message('success', 'แก้ไขข้อมูลกิจกรรมสำเร็จ');
            } else {
                $this->message('error', 'แก้ไขข้อมูลกิจกรรมไม่สำเร็จ');
            }
        } catch (\Exception $e) {
            $this->message('error', 'แก้ไขข้อมูลกิจกรรมไม่สำเร็จ: ' . $e->getMessage());
        } finally {
            $this->clear();
            $this->dispatch('closeModal', 'activityEdit');
        }
    }

    public function clear()
    {
        $this->reset(['image', 'description', 'activityId']);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function message($type, $message)
    {
        $this->alert($type, $message, [
            'toast' => false,
            'position' => 'center',
        ]);
    }

    public function render()
    {
        $data = PostActivity::query()
            ->when($this->search, fn($query) => $query->where('description', 'LIKE', "%{$this->search}%"))
            ->latest()
            ->paginate(10);

        return view('livewire.admin.activity', ['activities' => $data]);
    }
}
