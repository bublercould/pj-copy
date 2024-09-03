<div class="card">

    <table class="table table-striped mt-auto mb-auto mx-auto">
        <thead>
            <tr>
                <th scope="col ">
                    ลำดับ
                </th>
                <th scope="col">
                    ชื่อ - นามสกุล
                </th>
                <th scope="col">
                    อีเมล
                </th>
                <th scope="col">
                    สิทธิ์
                </th>
                <th scope="col">
                    จัดการ
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $key => $user)
                <tr>
                    <th scope="row">
                        {{ $users->total() - ($users->firstItem() + $key) + 1 }}
                    </th>
                    <td>
                        <div class="d-inline-block text-truncate" style="max-width: 150px;">
                            {{ $user->name }}
                        </div>
                    </td>
                    <td>
                        <div class="d-inline-block text-truncate" style="max-width: 110px;">
                            {{ $user->email }}
                        </div>
                    </td>
                    <td>
                        <div class="d-inline-block text-truncate" style="max-width: 110px;">
                            {{ $user->roles->name }}
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#usersEdit"
                            wire:click="edit('{{ $user->id }}')">
                            แก้ไข
                        </button>

                        {{-- Confrim Delete --}}
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#confrimDeleteId{{ $user->id }}">
                            ลบ
                        </button>

                        <div class="modal fade" id="confrimDeleteId{{ $user->id }}" data-bs-backdrop="static"
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
                                        ยืนยันการลบ หัวข้อ {{ $user->name }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            ยกเลิก
                                        </button>
                                        <button type="button" class="btn btn-danger"
                                            wire:click="delete('{{ $user->id }}', 'confrimDeleteId{{ $user->id }}')">
                                            ยืนยันการลบ
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- ./Confrim Delete --}}

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-danger text-center fw-bolder fs-5">
                        ไม่มีข้อมูล
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>

</div>
