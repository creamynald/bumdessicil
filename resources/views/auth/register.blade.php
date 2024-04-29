@extends('layouts.app')

@section('content')
    <form class="js-validation-signup" action="{{ route('register') }}" method="POST">
        @csrf
        <div class="block block-themed block-rounded block-fx-shadow">
            <div class="block-header bg-gd-emerald">
                <h3 class="block-title">Form Register</h3>
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
                    <label class="form-label" for="password">Password</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
                        placeholder="Confirm password">
                    <label class="form-label" for="password-confirm">Confirm Password</label>
                </div>
                {{-- dropdown with class form-floating --}}
                <div class="form-floating mb-4">
                    <select class="form-select form-select-lg" id="role" name="role">
                        <option value="customer">Konsumen</option>
                        <option value="bumdes">BUMDes</option>
                    </select>
                    <label class="form-label text-capitalize" for="role">Daftar Sebagai</label>
                </div>
                <div class="row">
                    <div class="col-sm-6 d-sm-flex align-items-center push">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="signup-terms" name="signup-terms"
                                value="1">
                            <label class="form-check-label" for="signup-terms">I agree to Terms</label>
                        </div>
                    </div>
                    <div class="col-sm-6 text-sm-end push">
                        <button type="submit" class="btn btn-lg btn-alt-primary fw-semibold">
                            Create Account
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
