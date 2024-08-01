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
                    <select class="form-select" id="bulan" name="bulan" size="1">
                        <option value="" selected="" disabled="">Pilih Bulan</option>
                        @php
                            $bulan = [
                                'Januari',
                                'Februari',
                                'Maret',
                                'April',
                                'Mei',
                                'Juni',
                                'Juli',
                                'Agustus',
                                'September',
                                'Oktober',
                                'November',
                                'Desember',
                            ];
                        @endphp
                        @foreach ($bulan as $index => $row)
                            <option value="{{ $index + 1 }}">{{ $row }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="block-options">
                    <select class="form-select" id="tahun" name="tahun" size="1">
                        <option value="" selected="" disabled="">Pilih Tahun</option>
                        @php
                            $tahunRange = range(2020, 2025); // Tahun dari 2020 hingga 2025
                        @endphp
                        @foreach ($tahunRange as $tahun)
                            <option value="{{ $tahun }}">{{ $tahun }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="block-options">
                    <button type="button" class="btn btn-danger" id="exportPdfButton">
                        <i class="fa fa-file"></i> Export PDF
                    </button>
                </div>
            </div>
            <div class="block-content block-content-full">
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
                            <th>Nama Pembeli</th>
                            <th class="d-none d-sm-table-cell">Status</th>
                            <th>Total Harga</th>
                            <th class="text-center" style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pemesanan as $index => $row)
                            <tr data-id="{{ $row->id }}">
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="fw-semibold">{{ $row->beras->jenisBeras->nama }}
                                    <span class="badge bg-success">{{ $row->berat }} Kg</span>
                                </td>
                                <td class="fw-semibold">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    @if ($row->nama_pembeli == null)
                                        {{ $row->user->name }}
                                    @else
                                        {{ $row->nama_pembeli }}
                                    @endif
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
                                            Sedang Diproses
                                        </span>
                                    @elseif($row->status == 'completed')
                                        <span class="badge bg-success">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            Selesai / telah dikirim
                                        </span>
                                    @else
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
                                        data-bs-toggle="tooltip" title="Detail">
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
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-center">Total Penjualan</th>
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

        $(document).ready(function() {
            $('#exportPdfButton').on('click', function() {
                var bulan = $('#bulan').val();
                var tahun = $('#tahun').val();
                
                if (bulan && !tahun) {
                    // Alert if bulan is selected but not tahun
                    Swal.fire({
                        icon: 'warning',
                        title: 'Peringatan',
                        text: 'Tahun harus dipilih jika bulan dipilih!',
                    });
                    return;
                }
                
                var url = '{{ route('orders.exportPdf', ['bulan' => ':bulan', 'tahun' => ':tahun']) }}';
                url = url.replace(':bulan', bulan || 'latest').replace(':tahun', tahun || '');
                window.location.href = url;
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