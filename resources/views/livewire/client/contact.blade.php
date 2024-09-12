<div class="mb-0 mt-0">
    <form wire:submit.prevent="store">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="name" placeholder="Your Name" wire:model="name" />
                    <label for="name">ชื่อ-นามสกุล</label>
                </div>
                @error('name')
                    <span class="mt-0 mb-0 text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" placeholder="Your Email"
                        wire:model="email" />
                    <label for="email">อีเมลของคุณ</label>
                </div>
                @error('email')
                    <span class="mt-0 mb-0 text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="col-12">
                <div class="form-floating">
                    <input type="text" class="form-control" id="title" placeholder="title" wire:model="title" />
                    <label for="title">หัวข้อ</label>
                </div>
                @error('title')
                    <span class="mt-0 mb-0 text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control" id="ContactInfo" placeholder="Contact Information"
                        wire:model="contactInfo" />
                    <label for="message">ช่องทางการติดต่อกลับ</label>
                </div>
                @error('contactInfo')
                    <span class="mt-0 mb-0 text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>



            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a message here" id="detail" style="height: 150px"
                        wire:model="detail"></textarea>
                    <label for="message">รายละเอียด</label>
                </div>
                @error('detail')
                    <span class="mt-0 mb-0 text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="col-12">
                <button class="btn btn-primary w-100 py-3" type="submit">
                    ส่งข้อความ
                </button>
            </div>
        </div>
    </form>
</div>
