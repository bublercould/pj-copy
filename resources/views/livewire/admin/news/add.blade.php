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
        data-bs-target="#addNews"
    >
        เพิ่มข้อมูล
    </button>
</div>

{{-- <div class="mx-0">
    <div class="text-start">
        <div class="mb-0">
            <label for="exampleInputEmail1" class="form-label">
                ค้นหา
            </label>
            <input type="text" class="form-control" />
        </div>
    </div>
    <div class="text-end">

        <button
            class="btn btn-primary mb-3"
            data-bs-toggle="modal"
            data-bs-target="#addNews"
        >
            เพิ่มข้อมูล
        </button>

    </div>
</div> --}}

<div class="modal fade" id="addNews" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    เพิ่มข่าวสาร
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="clear"></button>
            </div>
            <form wire:submit.prevent="submit">
                <div class="modal-body">

                    <div class="mb-2">
                        <label for="title" class="form-label">
                            หัวข้อ
                        </label>
                        <input
                            type="text"
                            id="title"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : null }}"
                            wire:model="name"
                            placeholder="Title"
                        />
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="description" class="form-label">
                            รายละเอียด
                        </label>
                        <textarea
                            class="form-control {{ $errors->has('descript') ? 'is-invalid' : null }}"
                            wire:model="descript"
                            placeholder="Description"
                        ></textarea>
                        @error('descript')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="description" class="form-label">
                            รูปภาพ
                        </label>
                        <input
                            type="file"
                            class="form-control {{ $errors->has('images') ? 'is-invalid' : null }}"
                            wire:model="images"
                        />
                        @error('images')
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
