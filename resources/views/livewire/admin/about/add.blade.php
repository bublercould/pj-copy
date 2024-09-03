<div class="row g-2 align-items-center">
    <div class="col-auto">
        <input
            type="text"
            class="form-control"
            placeholder="พิมพ์คำค้นหาที่นี่"
            wire:model.live.debounce.250ms="search"
        />
    </div>
</div>

<div class="text-end">
    <button
        class="btn btn-primary mb-3"
        data-bs-toggle="modal"
        data-bs-target="#addStaff"
    >
        เพิ่มข้อมูล
    </button>
</div>

<div class="modal fade" id="addStaff" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    เพิ่มบุคคลากร
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="clear"></button>
            </div>
            <form wire:submit.prevent="submit">
                <div class="modal-body">

                    <div class="mb-2">
                        <label for="title" class="form-label">
                            ชื่อ - นามสกุล
                        </label>
                        <input
                            type="text"
                            id="name"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : null }}"
                            wire:model="name"
                            placeholder="Firstname Lastname"
                        />
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="position" class="form-label">
                            ตำแหน่งงาน
                        </label>
                        <input
                            type="text"
                            id="position"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : null }}"
                            wire:model="position"
                            placeholder="Position"
                        />
                        @error('position')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="image" class="form-label">
                            รูปภาพ
                        </label>
                        <input
                            type="file"
                            class="form-control {{ $errors->has('image') ? 'is-invalid' : null }}"
                            wire:model="image"
                        />
                        @error('image')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-danger"
                        data-bs-dismiss="modal"
                        wire:click="clear"
                    >
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
