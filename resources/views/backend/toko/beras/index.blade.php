@extends('backend.layouts.app')

@section('title', 'BUMDes')
@section('subTitle', 'Beras')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="my-5 text-center">
            <h2 class="fw-bold mb-2">
                Daftar Beras di Toko Anda
            </h2>
            <h3 class="fs-base fw-medium text-muted mb-0">
                Anda saat ini memiliki {{ $jumlahBerasYangDimiliki }} data beras!
                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-large">Tambahkan satu lagi.</a>
            </h3>

        </div>
        <div class="row">
            @foreach ($daftarBeras as $row)
                <div class="col-md-6 col-xl-4">
                    <!-- Beras -->
                    <div class="block block-rounded">
                        <div class="block-content p-0 overflow-hidden">
                            <a class="img-link" href="be_pages_real_estate_listing.html">
                                @if ($row->foto)
                                    <img class="img-fluid rounded-top" src="{{ asset($row->foto) }}"
                                        alt="{{ $row->jenisBeras->nama }}">
                                @else
                                    <img class="img-fluid rounded-top" src="{{ asset('assets/media/photos/no_image.svg') }}"
                                        alt="Foto tidak tersedia">
                                @endif
                            </a>
                        </div>
                        <div class="block-content border-bottom">
                            <h4 class="fs-5 mb-2">
                                <a class="text-dark"
                                    href="be_pages_real_estate_listing.html">{{ $row->jenisBeras->nama }}</a>
                            </h4>
                            <h5 class="fs-1 fw-light mb-1 text-primary">Rp. {{ $row->harga }}/Kg</h5>
                        </div>
                        <div class="block-content border-bottom">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <i class="fa fa-fw fa-archive opacity-50 me-2 text-secondary"></i>
                                    <p class="mb-0"><strong>{{ $row->berat }}</strong> Kg</p>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <i class="fa fa-fw fa-tag opacity-50 me-2 text-secondary"></i>
                                    <p class="mb-0">
                                        {{ $row->jenisBeras->nama }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row g-sm">
                                <div class="col-8">
                                    <button class="btn btn-sm btn-primary w-100 edit-btn" data-bs-toggle="modal"
                                        data-bs-target="#edit-modal" data-id="{{ $row->id }}"
                                        data-jenis-beras-id="{{ $row->jenis_beras_id }}" data-harga="{{ $row->harga }}"
                                        data-berat="{{ $row->berat }}" data-deskripsi="{{ $row->deskripsi }}"
                                        data-foto="{{ $row->foto }}">
                                        <i class="fa fa-edit"></i>
                                        Ubah
                                    </button>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-sm btn-alt-danger w-100 delete-btn"
                                        data-id="{{ $row->id }}">
                                        <i class="fa fa-trash-alt"></i>
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Beras -->
                </div>
            @endforeach
        </div>
    </div>
    <!-- END Page Content -->

    @include('backend.toko.beras.modals.create')
    @include('backend.toko.beras.modals.edit')

@endsection

@push('css')
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
            $('.edit-btn').on('click', function() {
                var id = $(this).data('id');
                var jenisBerasId = $(this).data('jenis-beras-id');
                var harga = $(this).data('harga');
                var berat = $(this).data('berat');
                var deskripsi = $(this).data('deskripsi');
                var foto = $(this).data('foto');

                $('#edit-modal').find('form').attr('action', '/admin/toko/beras/' + id);
                $('#edit-modal').find('select[name=jenis_beras_id]').val(jenisBerasId);
                $('#edit-modal').find('input[name=harga]').val(harga);
                $('#edit-modal').find('input[name=berat]').val(berat);
                $('#edit-modal').find('textarea[name=deskripsi]').val(deskripsi);
                $('#edit-modal').find('input[name=foto]').val(foto);
            });
            $('.delete-btn').on('click', function() {
                var id = $(this).data('id');

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
                        deleteBeras(id);
                    }
                });
            });

            function deleteBeras(id) {
                $.ajax({
                    url: '/admin/toko/beras/' + id,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire(
                                'Berhasil!',
                                response.success,
                                'success'
                            ).then(function() {
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Gagal!',
                                response.error || 'Data gagal dihapus.',
                                'error'
                            );
                        }
                    },
                    error: function(response) {
                        Swal.fire(
                            'Error!',
                            'Terjadi kesalahan saat menghapus data.',
                            'error'
                        );
                    }
                });
            }
        });
    </script>
@endpush
