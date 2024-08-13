@extends('layouts.app')

@section('content')
    <form class="js-validation-signup" action="{{ route('register') }}" method="POST">
        @csrf
        <div class="block block-themed block-rounded block-fx-shadow">
            <div class="block-header bg-gd-emerald">
                <h3 class="block-title">Form Pendaftaran</h3>
            </div>
            <div class="block-content">
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                    <label class="form-label" for="name">Nama</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                    <label class="form-label" for="email">Email</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Enter your password">
                    <label class="form-label" for="password">Kata sandi</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
                        placeholder="Confirm password">
                    <label class="form-label" for="password-confirm">Ulangi Kata sandi</label>
                </div>
                <div class="form-floating mb-4">
                    <select class="form-select form-select-lg" id="role" name="role">
                        <option value="customer">Konsumen</option>
                        <option value="bumdes">BUMDes</option>
                    </select>
                    <label class="form-label text-capitalize" for="role">Daftar Sebagai</label>
                </div>
                <div class="form-floating mb-4" id="no_rekening_field" style="display: none;">
                    <input type="number" class="form-control" id="no_rekening" name="no_rekening"
                        placeholder="No. Rekening">
                    <label class="form-label" for="no_rekening">No Rekening</label>
                </div>
                <div class="form-floating mb-4" id="nama_bank_field" style="display: none;">
                    <select class="form-select form-select-lg" id="nama_bank" name="nama_bank">
                        <option value="brk">BRK</option>
                        <option value="bri">BRI</option>
                        <option value="bni">BNI</option>
                        <option value="bca">BCA</option>
                        <option value="mandiri">Mandiri</option>
                    </select>
                    <label class="form-label text-capitalize" for="nama_bank">Nama Bank</label>
                </div>
                <div class="form-group @error('dokumen') is-invalid @enderror" id="dokumen_field" style="display: none;">
                    <label class="form-label @error('dokumen') text-danger @enderror" for="dokumen">Upload Surat
                        Permohonan</label>
                    <input type="file" class="form-control mb-4" id="dokumen" name="dokumen">
                    @error('dokumen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-sm-6 d-sm-flex align-items-center push">
                        <div class="form-check">
                            <a href="{{ route('login') }}" class="link-fx text-muted">Sudah punya akun? masuk</a>
                        </div>
                    </div>
                    <div class="col-sm-6 text-sm-end push">
                        <button type="submit" class="btn btn-lg btn-alt-primary fw-semibold">
                            Buat akun
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var roleSelect = document.getElementById('role');
            var noRekeningField = document.getElementById('no_rekening_field');
            var namaBankField = document.getElementById('nama_bank_field');
            var dokumenField = document.getElementById('dokumen_field');

            roleSelect.addEventListener('change', function() {
                if (this.value === 'bumdes') {
                    noRekeningField.style.display = 'block';
                    namaBankField.style.display = 'block';
                    dokumenField.style.display = 'block';
                } else {
                    noRekeningField.style.display = 'none';
                    namaBankField.style.display = 'none';
                    dokumenField.style.display = 'none';
                }
            });
        });
    </script>
@endpush
