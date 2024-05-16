@extends('backend.layouts.app')

@section('title', 'BUMDes')
@section('subTitle', 'Jenis Beras')

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

                <button href="#" data-bs-toggle="modal" data-bs-target="#modal-large" class="btn-block-option">
                    <i class="si si-plus"></i> Tambah Data
                </button>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Jenis Beras</th>
                            <th class="d-none d-sm-table-cell">Urutan</th>
                            <th class="text-center" style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenisBeras as $index => $row)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="fw-semibold">{{ $row->nama }}</td>
                                <td class="d-none d-sm-table-cell text-center">
                                    <span class="badge bg-success">{{ $row->urutan }}</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('jenis-beras.edit', $row) }}" type="button"
                                        class="btn btn-sm btn-secondary" title="Edit">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" title="Delete">
                                        <i class="fa fa-trash-can"></i>
                                    </button>
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

    <!-- large Modal -->
    <div class="modal" id="modal-large" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Input Data @yield('subTitle')</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <form action="{{ route('jenis-beras.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="nama">Jenis Beras</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa fa-tag"></i>
                                        </span>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            placeholder="Jenis Beras">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="urutan">Urutan</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa fa-sort"></i>
                                        </span>
                                        <input type="number" class="form-control text-center" id="urutan" name="urutan"
                                            placeholder="Urutan">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 float-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-paper-plane opacity-50 me-1"></i> Kirim
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END large Modal -->


@endsection

@push('css')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
@endpush

@push('js')
    <script src="{{ asset('assets/js/codebase.app.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- Page JS Helpers (BS Notify Plugin) -->
    <script>
        $(document).ready(function() {
            @if (session()->has('success') || session()->has('error'))
                var messageType = '{{ session()->has('success') ? 'success' : 'error' }}';
                var messageText = '{{ session()->has('success') ? session('success') : session('error') }}';

                Codebase.helpers('jq-notify', {
                    align: 'center',
                    from: 'top',
                    type: messageType,
                    icon: messageType == 'success' ? 'fa fa-check me-5' : 'fa fa-exclamation-circle me-5',
                    message: messageText
                });
            @endif
        });
    </script>
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>

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
@endpush
