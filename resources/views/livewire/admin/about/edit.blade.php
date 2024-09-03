<div class="modal fade" id="staffEdit" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
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
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="name" class="form-label fs-5">
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
                        <label for="description" class="form-label fs-5">
                            ตำแหน่งงาน
                        </label>
                        <textarea
                            class="form-control {{ $errors->has('position') ? 'is-invalid' : null }}"
                            wire:model="position"
                            placeholder="Position"
                        ></textarea>
                        @error('position')
                            <span class="error">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    @if (!empty($this->original_image))

                        <div class="mb-3 mt-2 text-center">
                            <label class="form-label fs-5 mt-1">
                                รูปภาพเดิม
                            </label>
                            <a href="{{ asset($this->original_image) }}" data-lightbox="{{ $this->name }}" data-title="รูปภาพเดิม">
                                <img
                                    src="{{ asset($this->original_image) }}"
                                    width="80%"
                                    height="80%"
                                    class="img-thumbnail img-fluid rounded mx-auto d-block mb-2"
                                    alt="preview"
                                />
                            </a>
                        </div>

                    @endif

                    <div class="mb-2">
                        <label for="description" class="form-label fs-5">
                            รูปภาพใหม่
                        </label>
                        <input
                            type="file"
                            class="form-control {{ $errors->has('image') ? 'is-invalid' : null }}"
                            wire:model.live="image"
                        />
                        @error('images')
                            <span class="error">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    @if (!empty($this->image))

                        <div class="mb-3 mt-2 text-center">
                            <label class="form-label fs-5 mt-1 text-danger">
                                ตัวอย่าง รูปภาพใหม่
                            </label>
                            <a href="{{ asset('livewire-tmp/'.$this->image->getFilename()) }}" data-lightbox="{{ $this->name }}" data-title="รูปภาพใหม่">
                                <img
                                    src="{{ asset('livewire-tmp/'.$this->image->getFilename()) }}"
                                    width="80%"
                                    height="80%"
                                    class="img-thumbnail img-fluid rounded mx-auto d-block mb-2"
                                    alt="preview"
                                />
                            </a>
                        </div>

                    @endif

                </div>
                <div class="mt-2 mb-3 text-center">
                    <button
                        type="button"
                        class="btn btn-secondary btn-lg mx-auto"
                        data-bs-dismiss="modal"
                        wire:click="clear"
                    >
                        ยกเลิก
                    </button>
                    <button
                        type="submit"
                        class="btn btn-success btn-lg mx-auto"
                    >
                        บันทึก
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
