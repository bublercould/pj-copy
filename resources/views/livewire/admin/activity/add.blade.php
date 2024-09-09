<div class="row g-2 align-items-center">
    <div class="col-auto">
        <input type="text" class="form-control" placeholder="พิมพ์คำค้นหาที่นี่"
            wire:model.live.debounce.250ms="search" />
    </div>
</div>

<div class="text-end">
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addActivity">
        เพิ่มข้อมูล
    </button>
</div>

<div class="modal fade" id="addActivity" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    เพิ่มกิจกรรม
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="clear"></button>
            </div>
            <form wire:submit.prevent="submit">
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="description" class="form-label">
                            รายละเอียด
                        </label>
                        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : null }}" wire:model="description"
                            placeholder="Description"></textarea>
                        @error('description')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="description" class="form-label">
                            รูปภาพ
                        </label>
                        <input type="file" class="form-control {{ $errors->has('image_url') ? 'is-invalid' : null }}"
                            wire:model="image_url" />
                        @error('image_url')
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
