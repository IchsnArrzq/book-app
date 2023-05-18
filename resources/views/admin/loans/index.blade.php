@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="card-title">
                    Manage Loan
                </span>
            </div>
            <div class="card-body table-responsive">
                {{ $dataTable->table(['class' => 'w-100']) }}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
@push('scripts')
    <script>
        const callbackStatus = (e) => {
            const id = $(e).attr('data-id')
            Swal.fire({
                title: 'select the button to change the status',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Approve',
                denyButtonText: `Reject`,
                cancelButtonText: `Done`,
                icon: 'question',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/loans/${id}`,
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: 'PUT',
                            status: 1
                        },
                        success: function(response) {
                            $('#loans-table').DataTable().ajax.reload()
                            Swal.fire('status changed successfully to approve', '', 'success')
                        },
                        error: function(xhr, status, error) {
                            $('#loans-table').DataTable().ajax.reload()
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Terjadi kesalahan saat memproses permintaan!',
                            });
                        }
                    })
                } else if (result.isDenied) {
                    $.ajax({
                        url: `/admin/loans/${id}`,
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: 'PUT',
                            status: 2
                        },
                        success: function(response) {
                            $('#loans-table').DataTable().ajax.reload()
                            Swal.fire('status successfully changed to reject', '', 'success')
                        },
                        error: function(xhr, status, error) {
                            $('#loans-table').DataTable().ajax.reload()
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Terjadi kesalahan saat memproses permintaan!',
                            });
                        }
                    })
                } else {
                    $.ajax({
                        url: `/admin/loans/${id}`,
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: 'PUT',
                            status: 3
                        },
                        success: function(response) {
                            $('#loans-table').DataTable().ajax.reload()
                            Swal.fire('status successfully changed to done', '',
                                'success')
                        },
                        error: function(xhr, status, error) {
                            $('#loans-table').DataTable().ajax.reload()
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Terjadi kesalahan saat memproses permintaan!',
                            });
                        }
                    })
                }
            })
        }
    </script>
@endpush
