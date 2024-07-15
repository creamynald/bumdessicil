@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <!-- Header -->
        <div class="block block-rounded">
            <div class="block-content bg-white-5">
                <div class="py-4 text-center">
                    <h1 class="h2 fw-bold mb-2">SELAMAT DATANG DIWEBSITE PENJUALAN BERAS</h1>
                    {{-- image 100%--}}
                    <img src="{{ asset('assets/media/photos/header_dashboard.png') }}" alt="logo" class="img-fluid" style="max-width: 100px;">
                    <h2 class="h5 fw-medium">BUMDES SEKECAMATAN SIAK KECIL</h2>
                </div>
            </div>
        </div>
        <!-- END Header -->
    </div>
@endsection

@push('js')
    <script src="https://demo.pixelcave.com/codebase/assets/js/pages/be_pages_dashboard.min.js"></script>
@endpush
