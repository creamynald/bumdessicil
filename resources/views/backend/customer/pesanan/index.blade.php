@extends('backend.layouts.app')

@section('title', 'Customer')
@section('subTitle', 'Pesanan')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">@yield('title')</h2>
        <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <small>Table @yield('subTitle')</small>
                </h3>

                {{-- <button href="#" data-bs-toggle="modal" data-bs-target="#modal-large" class="btn-block-option">
                    <i class="si si-plus"></i> Tambah Data
                </button> --}}
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Jenis Beras</th>
                            <th>Toko</th>
                            <th>Harga</th>
                            <th class="d-none d-sm-table-cell">Status</th>
                            <th class="text-center" style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesanan as $index => $row)
                            <tr data-id="{{ $row->id }}">
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="fw-semibold">{{ $row->beras->jenisBeras->nama }}
                                    <span class="badge bg-success">{{ $row->berat }} Kg</span>
                                </td>
                                <td class="fw-semibold"><i class="fa fa-tag" aria-hidden="true"></i>
                                    {{ $row->beras->user->name }}</td>
                                <td class="fw-semibold">{{ formatRupiah($row->beras->harga) }}
                                </td>
                                <td class="d-none d-sm-table-cell text-center">
                                    @if ($row->status == 'pending')
                                        <span class="badge bg-warning">
                                            <i class="fa fa-clock" aria-hidden="true"></i>
                                            Menunggu Konfirmasi
                                        </span>
                                    @elseif($row->status == 'processing')
                                        <span class="badge bg-info">
                                            <i class="fa fa-spinner" aria-hidden="true"></i>
                                            Sedag Diproses
                                        </span>
                                    @elseif($row->status == 'completed')
                                        <span class="badge bg-success">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            Selesai / telah dikirim
                                        </span>
                                    @else($row->status == 'cancelled')
                                        <span class="badge bg-danger">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                            Pemesanan dibatalkan
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('customer.orders.detail', $row->id) }}"
                                        class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Detail">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    {{-- message icon --}}
                                    <a href="https://wa.me/{{ $row->user->no_hp }}?text=Hi,%20saya%20telah%20order%20di%20toko%20kamu,%20mohon%20konfirmasi%20dan%20diproses%20ya,%20terimakasih"
                                        class="btn btn-sm btn-success" data-bs-toggle="tooltip" title="Chat">
                                        <i class="fa fa-comments"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->

    {{-- @include('backend.customer.pesanan.detail') --}}
@endsection

@push('css')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
@endpush

@push('js')
    <!-- jQuery (required for DataTables plugin and BS Notify plugin) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>

    <!-- CSRF Token for AJAX -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
    @include('sweetalert::alert')
    <script>
        $(document).ready(function() {
            // Handle delete button click event
            $('.delete-btn').on('click', function() {
                var id = $(this).closest('tr').data('id');

                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: 'Data yang dihapus tidak dapat dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Tidak, Batal!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ url('admin/toko/jenis-beras') }}/' + id,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire(
                                        'Terhapus!',
                                        response.success,
                                        'success'
                                    ).then(function() {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire(
                                        'Error!',
                                        'Data gagal dihapus.',
                                        'error'
                                    );
                                }
                            },
                            error: function(response) {
                                Swal.fire(
                                    'Error!',
                                    response.responseJSON.error ||
                                    'Data gagal dihapus.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

            // Handle the edit button click event
            $('.edit-btn').on('click', function() {
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var urutan = $(this).data('urutan');

                $('#edit-nama').val(nama);
                $('#edit-urutan').val(urutan);

                // Update the form action
                $('#edit-form').attr('action', '{{ url('admin/toko/jenis-beras') }}/' + id);
            });
        });
    </script>



    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/codebase.app.min.js') }}"></script>
@endpush
