<div class="modal fade" id="contactEdit" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    แก้ไขข้อมูล
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="clear"></button>
            </div>
            <form wire:submit.prevent="update">
                <div class="modal-body">

                    <div class="mb-2">
                        <label for="title" class="form-label">
                            ชื่อผู้ติดต่อ
                        </label>
                        <input type="text" id="title"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : null }}" wire:model="name"
                            placeholder="Title" />
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="title" class="form-label">
                            อีเมล
                        </label>
                        <input type="text" id="email"
                            class="form-control {{ $errors->has('email') ? 'is-invalid' : null }}" wire:model="email"
                            placeholder="Email" />
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="title" class="form-label">
                            หัวข้อ
                        </label>
                        <input type="text" id="title"
                            class="form-control {{ $errors->has('title') ? 'is-invalid' : null }}" wire:model="title"
                            placeholder="หัวข้อ" />
                        @error('title')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="description" class="form-label">
                            รายละเอียด
                        </label>
                        <textarea class="form-control {{ $errors->has('detail') ? 'is-invalid' : null }}" wire:model="detail"
                            placeholder="Description"></textarea>
                        @error('detail')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="title" class="form-label">
                            ติดต่อกลับ
                        </label>
                        <input type="text" id="contact_info"
                            class="form-control {{ $errors->has('contact_info') ? 'is-invalid' : null }}"
                            wire:model="contact_info" placeholder="Description" />
                        @error('contact_info')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="description" class="form-label">
                            รูปภาพ
                        </label>
                        <input type="file"
                            class="form-control {{ $errors->has('attach_file') ? 'is-invalid' : null }}"
                            wire:model="attach_file" />
                        @error('images')
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
