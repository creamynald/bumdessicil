@extends('backend.layouts.app')

@section('title', 'Customer')
@section('subTitle', 'Cari Beras')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="my-5 text-center">
            <h2 class="fw-bold mb-2">
                Selamat datang di {{ env('APP_NAME') }}!
            </h2>
            <h3 class="fs-base fw-medium text-muted mb-0">
                daftar beras yang ada di {{ env('APP_NAME') }}.
            </h3>

        </div>
        <div class="row">
            @forelse ($daftarBeras as $row)
                <div class="col-md-6 col-xl-4">
                    <!-- Beras -->
                    <div class="block block-rounded">
                        <div class="block-content p-0 overflow-hidden">
                            <a class="img-link" href="#">
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
                                <a class="text-dark" href="#">{{ $row->jenisBeras->nama }}</a>
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
                                    <i class="fa fa-fw fa-shopping-bag opacity-50 me-2 text-secondary"></i>
                                    <p class="mb-0">
                                        {{ $row->user->name }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row g-sm">
                                <div class="col">
                                    <a href="{{ route('lihat-beras', $row->id) }}">
                                        <button type="button" class="btn btn-primary w-100">
                                            <i class="fa fa-fw fa-shopping-cart opacity-50 me-1"></i>
                                            Beli
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Beras -->
                </div>
            @empty
                <div class="col-12">
                    <div class="block block-rounded block-bordered">
                        <div class="block-content block-content-full text-center">
                            <h2 class="fw-bold">Tidak ada data</h2>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    <!-- END Page Content -->

@endsection

@push('css')
@endpush

@push('js')
@endpush
