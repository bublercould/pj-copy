<div class="modal fade" id="usersEdit" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    แก้ไขข้อมูล
                </h1>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                    wire:click="clear"
                ></button>
            </div>
            <form wire:submit.prevent="update">
                @csrf
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="title" class="form-label">
                            ชื่อ - นามสกุล
                        </label>
                        <input type="text" id="title"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : null }}" wire:model="name"
                            placeholder="Title" />
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="email" class="form-label">
                            อีเมล
                        </label>
                        <input type="text" id="email"
                            class="form-control {{ $errors->has('email') ? 'is-invalid' : null }}" wire:model="email"
                            placeholder="Title" />
                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="password" class="form-label">
                            รหัสผ่าน
                        </label>
                        <input type="text" id="password"
                            class="form-control {{ $errors->has('password') ? 'is-invalid' : null }}"
                            wire:model="password" placeholder="Title" />
                        @error('password')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="password_confirmation" class="form-label">
                            ยืนยันรหัสผ่าน
                        </label>
                        <input type="text" id="password_confirmation"
                            class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : null }}"
                            wire:model="password_confirmation" placeholder="Title" />
                        @error('password_confirmation')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="role_id" class="form-label">
                            สิทธิ์เข้าใช้งาน {{ $role_id }}
                        </label>
                        <select class="form-select {{ $errors->has('role_id') ? 'is-invalid' : null }}" wire:model="role_id">
                            <option selected>เลือกสิทธิ์เข้าใช้งาน</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>

                        @error('role_id')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" wire:click="clear">
                        ปิดหน้าต่าง
                    </button>
                    <button type="submit" class="btn btn-success">
                        เพิ่มข้อมูล
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
