<div class="card">
    <table class="table table-striped mt-auto mb-auto mx-auto">
        <thead>
            <tr>
                <th scope="col">ลำดับ</th>
                <th scope="col">ชื่อผู้ติดต่อ</th>
                <th scope="col">Email</th>
                <th scope="col">รายละเอียด</th>
                <th scope="col">ติดต่อกลับ</th>
                <th scope="col">ไฟล์</th>
                <th scope="col">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            @if (!$contacts->isEmpty())
                @foreach ($contacts as $key => $i)
                    <tr>
                        <th scope="row">{{ $contacts->total() - ($contacts->firstItem() + $key) + 1 }}</th>
                        <td>
                            <div class="d-inline-block text-truncate" style="max-width: 150px;">
                                {{ $i->name }}
                            </div>
                        </td>
                        <td>
                            <div class="d-inline-block text-truncate" style="max-width: 110px;">
                                {{ $i->email }}
                            </div>
                        </td>
                        <td>
                            <div class="d-inline-block text-truncate" style="max-width: 150px;">
                                {{ $i->detail }}
                            </div>
                            @if (mb_strlen($i->detail, 'UTF-8') > 10)
                                <button style="font-size: 2vh;" class="btn text-danger" data-bs-toggle="modal"
                                    data-bs-target="#readMoreId{{ $i->id }}">
                                    อ่านเพิ่มเติม
                                </button>
                                <div class="modal fade" id="readMoreId{{ $i->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 text-truncate" id="exampleModalLabel">
                                                    {{ $i->name }} : {{ $i->title }}
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{ $i->detail }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ปิด</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="d-inline-block text-truncate" style="max-width: 150px;">
                                {{ $i->contact_info }}
                            </div>
                        </td>
                        <td>
                            @if ($i->attach_file)
                                <a href="{{ asset('storage/' . $i->attach_file) }}" target="_blank">
                                    ดูไฟล์
                                </a>
                            @else
                                ไม่มีไฟล์แนบ
                            @endif
                        </td>
                        <td>
                            {{-- Confrim Delete --}}
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#confrimDeleteId{{ $i->id }}">
                                ลบ
                            </button>

                            <div class="modal fade" id="confrimDeleteId{{ $i->id }}" data-bs-backdrop="static"
                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                ยืนยันการลบ
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ยืนยันการลบ หัวข้อ {{ $i->name }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                ยกเลิก
                                            </button>
                                            <button type="button" class="btn btn-danger"
                                                wire:click="delete('{{ $i->id }}', 'confrimDeleteId{{ $i->id }}')">
                                                ยืนยันการลบ
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ./Confrim Delete --}}

                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" class="text-danger text-center fw-bolder fs-5">
                        ไม่มีข้อมูล
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="mt-3">
        {{ $contacts->links() }}
    </div>
</div>
