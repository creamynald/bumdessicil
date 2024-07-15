@extends('backend.layouts.app')

@section('title', 'BUMDes')
@section('subTitle', 'Pemesanan')

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

                <div class="block-options">
                    <button type="button" class="btn btn-sm btn-danger">
                        <i class="fa fa-file"></i> Export PDF
                    </button>
                </div>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <!-- Hidden form for updating the status -->
                <form id="cancel-form" action="" method="POST" style="display: none;">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="canceled">
                </form>
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Jenis Beras</th>
                            <th>Customer</th>
                            <th class="d-none d-sm-table-cell">Status</th>
                            <th>Total Harga</th>
                            <th class="text-center" style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemesanan as $index => $row)
                            <tr data-id="{{ $row->id }}">
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="fw-semibold">{{ $row->beras->jenisBeras->nama }}
                                    <span class="badge bg-success">{{ $row->berat }} Kg</span>
                                </td>
                                <td class="fw-semibold"><i class="fa fa-tag" aria-hidden="true"></i>
                                    {{ $row->user->name }}</td>
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
                                <td class="fw-semibold">{{ formatRupiah($row->total_harga) }}
                                </td>
                                <td class="text-center">
                                    <a href="https://wa.me/{{ $row->no_hp }}?text=hi,%20saya%20sudah%20proses%20pemesanan%20kamu"
                                        class="btn btn-sm btn-success" data-bs-toggle="tooltip" title="Chat">
                                        <i class="fa fa-comments"></i>
                                    </a>
                                    <a href="{{ route('orders.show', $row->id) }}" class="btn btn-sm btn-primary"
                                        data-bs-toggle="tooltip" title="Chat">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @if ($row->status == 'pending')
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                            title="Batalkan Pesanan"
                                            onclick="cancelOrder('{{ url('admin/toko/pemesanan/' . $row->id) }}')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" rowspan="row" class="text-center">Total Penjualan</th>
                            <th colspan="2">{{ formatRupiah($total_pendapatan) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->

    @include('backend.toko.jenisBeras.modals.create')
    @include('backend.toko.jenisBeras.modals.edit')
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
        function cancelOrder(url) {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: 'Pemesanan ini akan dibatalkan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Batalkan!',
                cancelButtonText: 'Tidak, Batal!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Set the form action to the URL passed in
                    $('#cancel-form').attr('action', url);
                    // Submit the form
                    $('#cancel-form').submit();
                }
            });
        }
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
