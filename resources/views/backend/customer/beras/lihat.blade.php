@extends('backend.layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="content content-boxed content-full overflow-hidden">
        <!-- Header -->
        <div class="py-5 text-center">
            <h1 class="fs-3 fw-bold mt-4 mb-2">
                Checkout
            </h1>
            <h2 class="fs-6 fw-medium text-muted mb-0">
                Terimakasih telah berbelanja ditoko <b>{{ $getBeras->user->name }}</b>, lengkapi form dibawah untuk lanjut
                ke pemesanan.
            </h2>
        </div>
        <!-- END Header -->

        <!-- Checkout -->
        <form action="{{ route('beli-beras', ['id' => $getBeras->id]) }}" method="POST">
            @csrf
            <div class="row">
                <!-- Order Info -->
                <div class="col-xl-7">
                    <!-- Shipping Address -->
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                1. Alamat pengiriman
                            </h3>
                        </div>
                        <div class="block-content">
                            {{-- <div class="row mb-4">
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter your firstname">
                                        <label class="form-label" for="name">Nama Depan</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name2" name="name2"
                                            placeholder="Enter your lastname">
                                        <label class="form-label" for="name2">Nama Belakang</label>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="Alamat Lengkap">
                                    <label class="form-label" for="alamat">Alamat</label>
                                </div>
                            </div>
                            {{-- <div class="row mb-4">
                                <div class="col-7">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="kota" name="kota"
                                            placeholder="Enter your city">
                                        <label class="form-label" for="kota">Kota</label>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="kodepos" name="kodepos"
                                            placeholder="Enter your postal">
                                        <label class="form-label" for="kodepos">Kodepos</label>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="no_hp" name="no_hp"
                                        placeholder="Enter your phone number">
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
                                <div class="col-6 col-sm-2">
                                    <div class="form-check form-block">
                                        <input type="radio" class="form-check-input" id="checkout-cod" name="pembayaran"
                                            value="cod" checked>
                                        <label class="form-check-label bg-body-light" for="checkout-cod">
                                            <span class="d-block p-1 ratio ratio-21x9">
                                                <svg fill="#000000" width="800px" height="800px" viewBox="0 0 32 32"
                                                    style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                                                    version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:serif="http://www.serif.com/"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">

                                                    <g transform="matrix(1,0,0,1,-240,-384)">

                                                        <g transform="matrix(1.2,0,0,1,66.4,93)">

                                                            <path
                                                                d="M168,300.472C168,300.162 167.94,299.855 167.824,299.578C167.441,298.659 166.521,296.452 165.961,295.106C165.678,294.428 165.101,294 164.47,294C161.728,294 154.272,294 151.53,294C150.899,294 150.322,294.428 150.039,295.106C149.479,296.452 148.559,298.659 148.176,299.578C148.06,299.855 148,300.162 148,300.472C148,302.843 148,313.511 148,318C148,318.53 148.176,319.039 148.488,319.414C148.801,319.789 149.225,320 149.667,320C153.433,320 162.567,320 166.333,320C166.775,320 167.199,319.789 167.512,319.414C167.824,319.039 168,318.53 168,318C168,313.511 168,302.843 168,300.472Z"
                                                                style="fill:rgb(144,224,239);" />

                                                        </g>

                                                        <path
                                                            d="M263.764,386L248.236,386C247.1,386 246.061,386.642 245.553,387.658L243.317,392.13C243.108,392.547 243,393.006 243,393.472C243,395.843 243,406.511 243,411C243,411.796 243.316,412.559 243.879,413.121C244.441,413.684 245.204,414 246,414C250.52,414 261.48,414 266,414C266.796,414 267.559,413.684 268.121,413.121C268.684,412.559 269,411.796 269,411L269,393.472C269,393.006 268.892,392.547 268.683,392.131L266.447,387.658C265.939,386.642 264.9,386 263.764,386ZM267,394L260,394L260,397.955C260,398.719 259.565,399.416 258.879,399.752C258.193,400.088 257.375,400.003 256.772,399.534L256,398.934L255.228,399.534C254.625,400.003 253.807,400.088 253.121,399.752C252.435,399.416 252,398.719 252,397.955L252,394L245,394L245,411C245,411.265 245.105,411.52 245.293,411.707C245.48,411.895 245.735,412 246,412L266,412C266.265,412 266.52,411.895 266.707,411.707C266.895,411.52 267,411.265 267,411C267,411 267,394 267,394ZM249.886,407.998C248.283,407.938 247,406.618 247,405C247,403.344 248.344,402 250,402L251,402C251.552,402 252,402.448 252,403C252,403.552 251.552,404 251,404C251,404 250,404 250,404C249.448,404 249,404.448 249,405C249,405.552 249.448,406 250,406L250.888,406C251.44,406 251.888,406.448 251.888,407C251.888,407.535 251.468,407.972 250.94,407.999L249.888,408L249.886,407.998ZM260,407C260,407.552 260.448,408 261,408L262,408C263.656,408 265,406.656 265,405C265,403.344 263.656,402 262,402L261,402C260.448,402 260,402.448 260,403L260,407ZM256,402C254.344,402 253,403.344 253,405C253,406.656 254.344,408 256,408C257.656,408 259,406.656 259,405C259,403.344 257.656,402 256,402ZM262,406C262.552,406 263,405.552 263,405C263,404.448 262.552,404 262,404L262,406ZM256,404C256.552,404 257,404.448 257,405C257,405.552 256.552,406 256,406C255.448,406 255,405.552 255,405C255,404.448 255.448,404 256,404ZM258,394L258,397.955C257.29,397.403 256.614,396.877 256.614,396.877C256.253,396.596 255.747,396.596 255.386,396.877L254,397.955L254,394L258,394ZM252.82,388L252.153,392L245.618,392L247.342,388.553C247.511,388.214 247.857,388 248.236,388L252.82,388ZM254.18,392L254.847,388L257.153,388L257.82,392L254.18,392ZM259.18,388L263.764,388C264.143,388 264.489,388.214 264.658,388.553L266.382,392L259.847,392L259.18,388Z"
                                                            style="fill:rgb(25,144,167);" />

                                                    </g>

                                                </svg>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-2">
                                    <div class="form-check form-block">
                                        <input type="radio" class="form-check-input" id="checkout-transfer"
                                            name="pembayaran" value="transfer">
                                        <label class="form-check-label bg-body-light" for="checkout-transfer">
                                            <span class="d-block p-1 ratio ratio-21x9">
                                                <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10 4C6.22876 4 4.34315 4 3.17157 5.17157C2 6.34315 2 8.22876 2 12C2 15.7712 2 17.6569 3.17157 18.8284C4.34315 20 6.22876 20 10 20H11.5M14 4C17.7712 4 19.6569 4 20.8284 5.17157C21.8915 6.23467 21.99 7.8857 21.9991 11"
                                                        stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                                    <path
                                                        d="M15.5 14V20M15.5 20L17.5 18M15.5 20L13.5 18M20 20V14M20 14L22 16M20 14L18 16"
                                                        stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M10 16H6" stroke="#1C274C" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                    <path d="M2 10L7 10M22 10L11 10" stroke="#1C274C" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                </svg>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0">
                        <div class="block-content block-content-full">
                            <div class="p-3 rounded-3 bg-body-light">
                                <div class="mb-4">
                                    <div class="form-floating">
                                        {{-- file input --}}
                                        <input type="file" class="form-control" id="bukti_pembayaran"
                                            name="bukti_pembayaran" accept="image/*">
                                        <label class="form-label fw-medium" for="bukti_pembayaran">Upload Bukti
                                            Transfer</label>
                                    </div>
                                </div>
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
                                                href="javascript:void(0)">{{ $getBeras->jenisBeras->nama }}</a>
                                            <div class="fs-sm text">{{ $getBeras->deskripsi }}</div>
                                            <div class="fs-sm text-muted">Toko : {{ $getBeras->user->name }}</div>
                                        </td>
                                        <td id="harga-beras" class="pe-0 fw-medium text-end">
                                            {{ formatRupiah($getBeras->harga) }}/kg
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td class="ps-0 fw-medium">Jumlah Beras (Kg)</td>
                                        <td class="pe-0 fw-medium text-end">
                                            <input type="number" class="form-control" id="berat" name="berat"
                                                value="1" min="1" max="100">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-0 fw-medium">Total</td>
                                        <td id="total-harga" class="pe-0 fw-bold text-end">Rp 0</td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary w-100 py-3">
                                <i class="fa fa-check opacity-50 me-1"></i>
                                Pesan Sekarang
                            </button>
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
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            // Bagian untuk menghitung total harga
            const hargaElement = document.getElementById('harga-beras');
            const jumlahInput = document.getElementById('berat');
            const totalElement = document.getElementById('total-harga');

            function updateTotal() {
                const harga = parseFloat(hargaElement.innerText.replace(/[^0-9,-]+/g, "").replace(',', '.'));
                const jumlah = parseInt(jumlahInput.value);
                const total = harga * jumlah;
                totalElement.innerText = `Rp. ${total.toLocaleString('id-ID')}`;
            }

            // Initial calculation
            updateTotal();

            // Event listener for input change
            jumlahInput.addEventListener('input', updateTotal);

            // Bagian untuk toggle visibility input payment receipt
            const checkoutCOD = document.getElementById('checkout-cod');
            const checkoutTransfer = document.getElementById('checkout-transfer');
            const paymentReceipt = document.getElementById('bukti_pembayaran').closest('.mb-4');

            function togglePaymentReceipt() {
                if (checkoutTransfer.checked) {
                    paymentReceipt.style.display = 'block';
                } else {
                    paymentReceipt.style.display = 'none';
                }
            }

            // Initial state, hide payment receipt since default is COD
            togglePaymentReceipt();

            // Event listeners for radio buttons
            checkoutCOD.addEventListener('change', togglePaymentReceipt);
            checkoutTransfer.addEventListener('change', togglePaymentReceipt);
        });
    </script>
@endpush
