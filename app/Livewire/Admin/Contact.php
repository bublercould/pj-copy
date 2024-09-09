<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Contact as PostContact;

class Contact extends Component
{
    use WithPagination, WithFileUploads, WithoutUrlPagination, LivewireAlert;

    public $search = "";
    public $contactId, $name, $email, $title, $detail, $contact_info, $attach_file, $original_file;

    protected $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email',
        'title' => 'required|max:255',
        'detail' => 'required',
        'contact_info' => 'required|max:255',
        'attach_file' => 'nullable|file|max:10240'
    ];

    protected $messages = [
        'name.required' => 'โปรดกรอกชื่อผู้ติดต่อ',
        'email.required' => 'โปรดกรอกอีเมล',
        'email.email' => 'อีเมลไม่ถูกต้อง',
        'title.required' => 'โปรดกรอกหัวเรื่อง',
        'detail.required' => 'โปรดกรอกรายละเอียด',
        'contact_info.required' => 'โปรดกรอกช่องทางการติดต่อกลับ',
        'attach_file.max' => 'ขนาดไฟล์ใหญ่เกิน 10MB',
    ];

    public function submit()
    {
        try {
            $this->validate();

            $filePath = $this->attach_file ? $this->attach_file->store('uploads', 'public') : null;

            PostContact::create([
                'name' => $this->name,
                'email' => $this->email,
                'title' => $this->title,
                'detail' => $this->detail,
                'contact_info' => $this->contact_info,
                'attach_file' => $filePath,
                'ref_code' => $this->generateRefCode(),
            ]);

            $this->alert('success', 'เพิ่มข้อมูลสำเร็จ');
        } catch (\Exception $e) {
            $this->alert('error', 'เพิ่มข้อมูลไม่สำเร็จ: ' . $e->getMessage());
        } finally {
            $this->clear();
        }
    }

    public function delete($id = null, $modalId = null)
    {
        try {
            if ($id) {
                $contact = PostContact::find($id);
                if ($contact) {
                    $contact->delete();
                    $this->alert('success', 'ลบข้อมูลสำเร็จ');
                } else {
                    $this->alert('error', 'ไม่มีข้อมูลชุดนี้, หรือ ถูกลบออกแล้ว');
                }
            } else {
                $this->alert('error', 'ไม่สามารถลบได้โปรดลองใหม่อีกครั้ง');
            }
        } catch (\Exception $e) {
            $this->alert('error', 'ไม่สามารถลบข้อมูลได้: ' . $e->getMessage());
        } finally {
            $this->dispatch('closeModal', $modalId);
        }
    }

    public function edit($id = null)
    {
        try {
            if ($id) {
                $contact = PostContact::find($id);
                if ($contact) {
                    $this->fill($contact->only(['id', 'name', 'email', 'title', 'detail', 'contact_info', 'attach_file']));
                    $this->original_file = $contact->attach_file;
                } else {
                    throw new \Exception('ไม่มีข้อมูลชุดนี้, หรือ ถูกลบออกแล้ว');
                }
            } else {
                throw new \Exception('โหลดข้อมูลไม่ได้');
            }
        } catch (\Exception $e) {
            $this->alert('error', $e->getMessage());
            $this->dispatch('closeModal', 'contactEdit');
        }
    }

    public function update()
    {
        try {
            $this->validate();

            $filePath = $this->attach_file ? $this->attach_file->store('uploads', 'public') : $this->original_file;

            $contact = PostContact::find($this->contactId);
            if ($contact) {
                $contact->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'title' => $this->title,
                    'detail' => $this->detail,
                    'contact_info' => $this->contact_info,
                    'attach_file' => $filePath,
                ]);
                $this->alert('success', 'แก้ไขข้อมูลสำเร็จ');
            } else {
                $this->alert('error', 'แก้ไขข้อมูลไม่สำเร็จ');
            }
        } catch (\Exception $e) {
            $this->alert('error', 'แก้ไขข้อมูลไม่สำเร็จ: ' . $e->getMessage());
        } finally {
            $this->clear();
            $this->dispatch('closeModal', 'contactEdit');
        }
    }

    public function clear()
    {
        $this->reset([
            'name', 'email', 'title', 'detail', 'contact_info', 'attach_file', 'original_file', 'contactId',
        ]);
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

    private function generateRefCode()
    {
        return 'C' . date('Ymd') . str_pad(PostContact::max('id') + 1, 4, '0', STR_PAD_LEFT);
    }

    public function render()
    {
        $data = PostContact::query()
            ->when($this->search, fn($query) => $query->where(function ($query) {
                $query->where('name', 'LIKE', "%{$this->search}%")
                      ->orWhere('title', 'LIKE', "%{$this->search}%");
            }))
            ->latest()
            ->paginate(10);

        return view('livewire.admin.contact.data', ['contacts' => $data]);
    }
}
