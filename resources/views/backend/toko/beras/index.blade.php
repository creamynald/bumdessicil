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
            <div class="col-md-6 col-xl-4">
                <!-- Beras -->
                @foreach ($daftarBeras as $row)
                    <div class="block block-rounded">
                        <div class="block-content p-0 overflow-hidden">
                            <a class="img-link" href="be_pages_real_estate_listing.html">
                                <img class="img-fluid rounded-top" src="{{ asset('assets/media/photos/photo35.jpg') }}"
                                    alt="Foto Beras">
                            </a>
                        </div>
                        <div class="block-content border-bottom">
                            <h4 class="fs-5 mb-2">
                                <a class="text-dark" href="be_pages_real_estate_listing.html">{{ $row->jenisBeras->nama }}</a>
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
                                    <a class="btn btn-sm btn-primary w-100" href="be_pages_real_estate_listing.html">
                                        Info lebih lanjut
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a class="btn btn-sm btn-alt-primary w-100"
                                        href="be_pages_real_estate_listing_new.html">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- END Beras -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->

    @include('backend.toko.beras.modals.create')


@endsection

@push('css')
@endpush

@push('js')
@endpush
