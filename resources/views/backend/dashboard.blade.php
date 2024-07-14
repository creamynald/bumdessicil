@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-6 col-xl-3">
                <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                    <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                        <div class="d-none d-sm-block">
                            <i class="fa fa-shopping-bag fa-2x opacity-25"></i>
                        </div>
                        <div>
                            <div class="fs-3 fw-semibold">{{ $jumlah_penjualan }}</div>
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Penjualan</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                    <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                        <div class="d-none d-sm-block">
                            <i class="fa fa-wallet fa-2x opacity-25"></i>
                        </div>
                        <div>
                            <div class="fs-3 fw-semibold">{{ $jumlah_pendapatan }}</div>
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Pendapatan</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                    <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                        <div class="d-none d-sm-block">
                            <i class="fa fa-envelope-open fa-2x opacity-25"></i>
                        </div>
                        <div>
                            <div class="fs-3 fw-semibold">{{ $jumlah_chat }}</div>
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Chat</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                    <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                        <div class="d-none d-sm-block">
                            <i class="fa fa-users fa-2x opacity-25"></i>
                        </div>
                        <div>
                            <div class="fs-3 fw-semibold">{{ $jumlah_produk }}</div>
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Jumlah Beras</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="block block-rounded">
                    <div class="block-header">
                        <h3 class="block-title">
                            Sales <small>This week</small>
                        </h3>
                    </div>
                    <div class="block-content p-1 bg-body-light">
                        <canvas id="js-chartjs-dashboard-lines"
                            style="height: 290px; display: block; box-sizing: border-box; width: 580px;" width="580"
                            height="290"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block block-rounded">
                    <div class="block-header">
                        <h3 class="block-title">
                            Earnings <small>This week</small>
                        </h3>
                    </div>
                    <div class="block-content p-1 bg-body-light">
                        <canvas id="js-chartjs-dashboard-lines2"
                            style="height: 290px; display: block; box-sizing: border-box; width: 580px;" width="580"
                            height="290"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://demo.pixelcave.com/codebase/assets/js/pages/be_pages_dashboard.min.js"></script>
@endpush
