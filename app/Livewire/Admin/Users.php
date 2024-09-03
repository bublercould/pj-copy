<?php

namespace App\Livewire\Admin;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

use Jantinnerezo\LivewireAlert\LivewireAlert;

class Users extends Component
{
    use WithPagination;
    use WithFileUploads;
    use WithoutUrlPagination;

    use LivewireAlert;

    public $search = "";

    public $userId;
    public $name;
    public $email;
    public $role_id;
    public $password;
    public $password_confirmation;

    public function submit()
    {
        $validate = $this->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/|confirmed',
                'role_id' => 'required',
            ],
            [
                'name.required' => 'โปรดกรอก ชื่อ-นามสกุล',
                'name.max' => 'ชื่อ-นามสกุล ยาวเกินไป',
                'email.required' => 'โปรดกรอกอีเมล',
                'email.email' => 'อีเมลไม่ถูกต้อง',
                'email.unique' => 'อีเมลนี้ถูกใช้ไปแล้ว',
                'password.required' => 'โปรดกรอกรหัสผ่าน',
                'password.min' => 'รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัวอักษร',
                'password.regex' => 'รหัสผ่านต้องมีตัวอักษรภาษาอังกฤษพิมพ์เล็กอย่างน้อยหนึ่งตัว พิมพ์ใหญ่อย่างน้อยหนึ่งตัว ตัวเลขอย่างน้อยหนึ่งตัว และอักขระพิเศษอย่างน้อยหนึ่งตัว (@, $, !, %, *, #, ?, &)',
                'password.confirmed' => 'การยืนยันรหัสผ่านไม่ตรงกัน',
                'role_id.required' => 'โปรดเลือกสิทธิ์ผู้ใช้งาน',
            ]
        );


        $user = User::create($validate);

        if ($user) {
            $this->message('success', 'เพิ่มข้อมูลสำเร็จ');
        } else {
            $this->message('error', 'เพิ่มข้อมูลไม่สำเร็จ');
        }

        $this->dispatch('closeModal', id: 'addUsers');
        $this->clear();
    }

    public function delete($id = null, $modalId = null)
    {

        if (!empty($id)) {

            $post = User::find($id);

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
        try {
            $post = User::findOrFail($id);
            $this->userId = $post->id;
            $this->name = $post->name;
            $this->email = $post->email;
            $this->role_id = $post->role_id;
        } catch (\Exception $e) {
            $this->message('error', 'ไม่มีข้อมูลชุดนี้, หรือ ถูกลบออกแล้ว');
            $this->dispatch('closeModal', id: 'usersEdit');
        }
    }

    public function update()
    {

        $validate = $this->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users,email,' . $this->userId,
                'password' => 'required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/|confirmed',
                'role_id' => 'required',
            ],
            [
                'name.required' => 'โปรดกรอก ชื่อ-นามสกุล',
                'name.max' => 'ชื่อ-นามสกุล ยาวเกินไป',
                'email.required' => 'โปรดกรอกอีเมล',
                'email.unique' => 'อีเมลนี้ถูกใช้ไปแล้ว',
                'email.email' => 'อีเมลไม่ถูกต้อง',
                'password.required' => 'โปรดกรอกรหัสผ่าน',
                'password.min' => 'รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัวอักษร',
                'password.regex' => 'รหัสผ่านต้องมีตัวอักษรภาษาอังกฤษพิมพ์เล็กอย่างน้อยหนึ่งตัว พิมพ์ใหญ่อย่างน้อยหนึ่งตัว ตัวเลขอย่างน้อยหนึ่งตัว และอักขระพิเศษอย่างน้อยหนึ่งตัว (@, $, !, %, *, #, ?, &)',
                'password.confirmed' => 'การยืนยันรหัสผ่านไม่ตรงกัน',
                'role_id.required' => 'โปรดเลือกสิทธิ์ผู้ใช้งาน',
            ]
        );

        $post = User::find($this->userId);

        $post->update($validate);

        if ($post) {
            $this->message('success', 'แก้ไขข้อมูลสำเร็จ');
        } else {
            $this->message('error', 'แก้ไขข้อมูลไม่สำเร็จ');
        }

        $this->clear();
        $this->dispatch('closeModal', id: 'usersEdit');
    }

    public function clear()
    {

        $this->reset(
            'name',
            'email',
            'password',
            'password_confirmation',
            'role_id',
            'userId',
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

        $users = User::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%')
                        ->orWhereHas('roles', function ($query) use ($search) {
                            return $query->where('name', 'LIKE', '%' . $search . '%');
                        });
                });
            })
            ->latest()
            ->paginate(10);

        $roles = Role::all();

        return view(
            'livewire.admin.users',
            [
                'users' => $users,
                'roles' => $roles
            ]
        );
    }
}
