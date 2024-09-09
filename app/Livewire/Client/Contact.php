<?php

namespace App\Livewire\Client;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Contact as ConInfo;

class Contact extends Component
{
    use LivewireAlert, WithFileUploads; 

    public $name;
    public $email;
    public $title;
    public $contactInfo;
    public $detail;
    public $attachFile;

    protected $rules = [
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'title' => 'required|max:255',
        'contactInfo' => 'required|max:255',
        'detail' => 'required|max:255',
        'attachFile' => 'nullable|file|max:10240',
    ];

    protected $messages = [
        'name.required' => 'กรุณากรอก ชื่อ และ นามสกุล',
        'email.required' => 'กรุณากรอก อีเมล์',
        'title.required' => 'กรุณากรอก หัวข้อ',
        'contactInfo.required' => 'กรุณากรอก ช่องทางการติดต่อกลับ',
        'detail.required' => 'กรุณากรอก รายละเอียด',
    ];

    public function store()
    {
        $this->validate();

        $attach_file = null;
        if ($this->attachFile) {
            $attach_file = $this->attachFile->store('uploads', 'public'); // บันทึกไฟล์
        }

        $save = ConInfo::create([
            'name' => $this->name,
            'title' => $this->title,
            'email' => $this->email,
            'detail' => $this->detail,
            'contact_info' => $this->contactInfo,
            'file_path' => $attach_file, // เพิ่มไฟล์ลงในฐานข้อมูล
        ]);

        $refCode = "C" . DATE("Ymd") . str_pad($save->id, 3, "0", STR_PAD_LEFT);

        $find = ConInfo::find($save->id);

        $find->update([
            'ref_code' => $refCode
        ]);

        if (!empty($save->id)) {
            $this->alert('success', 'สำเร็จ', [
                'position' => 'center',
                'timer' => '',
                'toast' => false,
                'showConfirmButton' => true,
                'onConfirmed' => '',
                'confirmButtonText' => 'ตกลง',
                'text' => 'ส่งข้อมูลการติดต่อสำเร็จแล้ว, โปรดรอเจ้าหน้าที่ติดต่อกลับ หมายเลขอ้างอิง : ' . $refCode,
            ]);
        } else {
            $this->alert('error', 'ไม่สำเร็จ', [
                'position' => 'center',
                'timer' => '',
                'toast' => false,
                'showConfirmButton' => true,
                'onConfirmed' => '',
                'confirmButtonText' => 'ตกลง',
                'text' => 'ส่งข้อมูลการติดต่อไม่สำเร็จแล้ว, กรุณาลองใหม่อีกครั้ง',
            ]);
        }

        $this->reset(
            'name',
            'title',
            'email',
            'detail',
            'contactInfo',
            'attachFile' // เพิ่ม reset สำหรับไฟล์
        );

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.client.contact');
    }
}

