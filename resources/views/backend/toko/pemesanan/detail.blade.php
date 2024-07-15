@extends('backend.layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="content content-boxed content-full overflow-hidden">
        <!-- Header -->
        <div class="py-5 text-center">
            <h1 class="fs-3 fw-bold mt-4 mb-2">
                Transaksi ID #{{ $lihat_pesanan->id }}
            </h1>
            <h2 class="fs-6 fw-medium text-muted mb-0">
                Detail Orderan dari <b>{{ $lihat_pesanan->user->name }}</b>, Silahkan update pesanan secara berkala,
                terimakasih
            </h2>
        </div>
        <!-- END Header -->

        <!-- Checkout -->
        <form action="{{ route('orders.update', $lihat_pesanan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <!-- Order Info -->
                <div class="col-xl-7">
                    <!-- Shipping Address -->
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                1. Alamat Customer
                            </h3>
                        </div>
                        <div class="block-content">
                            <div class="mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        value="{{ $lihat_pesanan->alamat }}" disabled>
                                    <label class="form-label" for="alamat">Alamat</label>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="no_hp" name="no_hp"
                                        value="{{ $lihat_pesanan->no_hp }}" disabled>
                                    <label class="form-label" for="no_hp">Nomor HP/Whatsapp</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Shipping Address -->

                    <!-- Payment -->
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                2. Pembayaran
                            </h3>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row g-3">
                                @if ($lihat_pesanan->pembayaran == 'cod')
                                    <div class="col-12">
                                        <div class="alert alert-warning" role="alert">
                                            <i class="fa fa-info
                                                me-1"></i>
                                            Pembayaran dilakukan secara <b>Cash On Delivery</b>
                                        </div>
                                    </div>
                                @elseif($lihat_pesanan->pembayaran == 'transfer')
                                    <div class="col-12 text-center">
                                        <div class="alert alert-warning" role="alert">
                                            <i class="fa fa-info
                                                me-1"></i>
                                            Pembayaran dilakukan secara <b>Transfer Bank</b>, <a
                                                href="{{ asset($lihat_pesanan->bukti_pembayaran) }}">lihat disini!</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Payment -->
                </div>
                <!-- END Order Info -->

                <!-- Order Summary -->
                <div class="col-xl-5 order-xl-last">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                Ringkasan Pesanan
                            </h3>
                        </div>
                        <div class="block-content block-content-full">
                            <table class="table table-vcenter">
                                <tbody>
                                    <tr>
                                        <td class="ps-0">
                                            <a class="fw-semibold"
                                                href="javascript:void(0)">{{ $lihat_pesanan->beras->jenisBeras->nama }}</a>
                                            <div class="fs-sm text">{{ $lihat_pesanan->deskripsi }}</div>
                                            <div class="fs-sm text-muted">Tanggal : {{ $lihat_pesanan->created_at }}</div>
                                        </td>
                                        <td id="harga-beras" class="pe-0 fw-medium text-end">
                                            {{ formatRupiah($lihat_pesanan->beras->harga) }}/kg
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td class="ps-0 fw-medium">Jumlah Beras (Kg)</td>
                                        <td class="pe-0 fw-medium text-end">
                                            <input type="number" class="form-control" id="berat" name="berat"
                                                value="{{ $lihat_pesanan->berat }}" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-0 fw-medium">Total</td>
                                        <td id="total-harga" class="pe-0 fw-bold text-end">
                                            {{ formatRupiah($lihat_pesanan->total_harga) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            {{-- invicible form for status change to processing --}}
                            <input type="hidden" name="status"
                                value="{{ $lihat_pesanan->status == 'processing' ? 'completed' : 'processing' }}">

                            @if ($lihat_pesanan->status == 'pending')
                                <button type="submit" class="btn btn-primary w-100 py-3">
                                    <i class="fa fa-check opacity-50 me-1"></i>
                                    Proses Pemesanan
                                </button>
                            @elseif($lihat_pesanan->status == 'processing')
                                <button type="submit" class="btn btn-primary w-100 py-3">
                                    <i class="fa fa-check opacity-50 me-1"></i>
                                    Dikirim / Selesai
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- END Order Summary -->
            </div>
        </form>
        <!-- END Checkout -->
    </div>
    <!-- END Page Content -->
@endsection

@push('css')
    <style>
        .hidden {
            display: none;
        }
    </style>
@endpush

@push('js')
@endpush
