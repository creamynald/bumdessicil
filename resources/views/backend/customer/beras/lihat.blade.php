@extends('backend.layouts.app')
@section('content')
    <div class="content content-boxed content-full overflow-hidden">
        <div class="py-5 text-center">
            <h1 class="fs-3 fw-bold mt-4 mb-2">
                Checkout
            </h1>
            <h2 class="fs-6 fw-medium text-muted mb-0">
                Terimakasih telah berbelanja ditoko <b>{{ $getBeras->user->name }}</b>, lengkapi form dibawah untuk lanjut ke pemesanan.
            </h2>
        </div>

        <form action="{{ route('beli-beras', ['id' => $getBeras->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-7">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                1. Alamat pengiriman
                            </h3>
                        </div>
                        <div class="block-content">
                            <div class="mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" required>
                                    <label class="form-label" for="alamat">Alamat</label>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Enter your phone number" required>
                                    <label class="form-label" for="no_hp">Nomor HP/Whatsapp</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                2. Pembayaran
                            </h3>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="mb-4">
                                <div class="space-y-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="pembayaran-cod" name="pembayaran" value="cod" checked>
                                        <label class="form-check-label" for="pembayaran-cod">Cash On Delivery (COD)</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="pembayaran-transfer" name="pembayaran" value="transfer">
                                        <label class="form-check-label" for="pembayaran-transfer">Transfer</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0">
                        <div class="block-content block-content-full">
                            <div class="p-3 rounded-3 bg-body-light">
                                <div class="mb-4 hidden" id="upload-bukti">
                                    <div class="form-floating">
                                        <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*">
                                        <label class="form-label fw-medium" for="bukti_pembayaran">Upload Bukti Transfer</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                            <a class="fw-semibold" href="javascript:void(0)">{{ $getBeras->jenisBeras->nama }}</a>
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
                                            <input type="number" class="form-control" id="berat" name="berat" value="1" min="1" max="100">
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
            </div>
        </form>
    </div>
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
            const hargaElement = document.getElementById('harga-beras');
            const jumlahInput = document.getElementById('berat');
            const totalElement = document.getElementById('total-harga');
            const transferRadio = document.getElementById('pembayaran-transfer');
            const codRadio = document.getElementById('pembayaran-cod');
            const buktiPembayaranDiv = document.getElementById('upload-bukti');

            function updateTotal() {
                const harga = parseFloat(hargaElement.innerText.replace(/[^0-9,-]+/g, "").replace(',', '.'));
                const jumlah = parseInt(jumlahInput.value);
                const total = harga * jumlah;
                totalElement.innerText = `Rp. ${total.toLocaleString('id-ID')}`;
            }

            function toggleBuktiPembayaran() {
                if (transferRadio.checked) {
                    buktiPembayaranDiv.classList.remove('hidden');
                } else {
                    buktiPembayaranDiv.classList.add('hidden');
                }
            }

            jumlahInput.addEventListener('input', updateTotal);
            transferRadio.addEventListener('change', toggleBuktiPembayaran);
            codRadio.addEventListener('change', toggleBuktiPembayaran);

            updateTotal();
            toggleBuktiPembayaran();
        });
    </script>
@endpush