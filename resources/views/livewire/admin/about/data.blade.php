<div class="card">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col ">
                    ลำดับ
                </th>
                <th scope="col">
                    ชื่อ-นามสกุล
                </th>
                <th scope="col">
                    ตำแหน่ง
                </th>
                <th scope="col">
                    รูปภาพ
                </th>
                <th scope="col">
                    จัดการ
                </th>
            </tr>
        </thead>
        <tbody>
            @if(!$staff->isEmpty())
                @foreach ($staff as $key => $i)
                    <tr>
                        <th scope="row">
                            {{ $staff->total() - ($staff->firstItem() + $key) + 1 }}
                        </th>
                        <td>
                            <div class="d-inline-block text-truncate" style="max-width: 150px;">
                                {{ $i->name }}
                            </div>
                        </td>
                        <td>
                            <div class="d-inline-block text-truncate" style="max-width: 150px;">
                                {{ $i->position }}
                            </div>
                            @if (mb_strlen( $i->position, 'UTF-8') > 20)
                                <button
                                    style="font-size: 1.8vh;"
                                    class="btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#readMoreId{{ $i->id }}"
                                >
                                    อ่านเพิ่มเติม
                                </button>
                                <div class="modal fade" id="readMoreId{{ $i->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                                                    อ่านเพิ่มเติม
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-wrap text-break lh-base fs-4 mx-3">
                                                    {{ $i->position }}
                                                </div>
                                            </div>
                                            <div class="text-center mb-3 mt-2">
                                                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">
                                                    ปิดหน้าต่าง
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td>
                            <button
                                class="btn btn-info btn-sm"
                                onclick="Swal.fire({ imageUrl: '{{ asset($i->image) }}', confirmButtonText: 'ปิดหน้าต่าง' })"
                            >
                                ดูรูปภาพ
                            </button>
                        </td>
                        <td>
                            <button
                                class="btn btn-warning btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#staffEdit"
                                wire:click="edit('{{ $i->id }}')"
                            >
                                แก้ไข
                            </button>

                            {{-- Confrim Delete --}}
                            <button
                                class="btn btn-danger btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#confrimDeleteId{{ $i->id }}"
                            >
                                ลบ
                            </button>

                            <div class="modal fade" id="confrimDeleteId{{ $i->id }}" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                ยืนยันการลบ
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ยืนยันการลบ หัวข้อ {{ $i->name }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                ยกเลิก
                                            </button>
                                            <button
                                                type="button"
                                                class="btn btn-danger"
                                                wire:click="delete('{{ $i->id }}', 'confrimDeleteId{{ $i->id }}')"
                                            >
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
                    <td colspan="5" class="text-danger text-center fw-bolder fs-5">
                        ไม่มีข้อมูล
                    </td>
                </tr>
            @endif

        </tbody>
    </table>

</div>
