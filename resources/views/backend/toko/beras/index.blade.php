@extends('backend.layouts.app')

@section('title', $title)
@section('subTitle', $subtitle)

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="my-5 text-center">
            <h2 class="fw-bold mb-2">
                Daftar Beras di Toko Anda
            </h2>
            <h3 class="fs-base fw-medium text-muted mb-0">
                Anda saat ini memiliki 6 data beras!
                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-large">Tambahkan satu lagi.</a>
            </h3>

        </div>
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <!-- Property -->
                <div class="block block-rounded">
                    <div class="block-content p-0 overflow-hidden">
                        <a class="img-link" href="be_pages_real_estate_listing.html">
                            <img class="img-fluid rounded-top" src="{{ asset('assets/media/photos/photo35.jpg') }}"
                                alt="">
                        </a>
                    </div>
                    <div class="block-content border-bottom">
                        <h4 class="fs-5 mb-2">Nama Beras</h4>
                        <h5 class="fs-1 fw-light mb-1 text-primary">Rp. 16.700/Kg</h5>
                    </div>
                    <div class="block-content border-bottom">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <i class="fa fa-fw fa-archive opacity-50 me-2 text-secondary"></i>
                                <p class="mb-0"><strong>2</strong> stok</p>
                            </div>
                            <div class="col-6 d-flex align-items-center">
                                <i class="fa fa-fw fa-tag opacity-50 me-2 text-secondary"></i>
                                <p class="mb-0">Beras Merah</p>
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
                                <a class="btn btn-sm btn-alt-primary w-100" href="be_pages_real_estate_listing_new.html">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Property -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->

    <!-- large Modal -->
    <div class="modal" id="modal-large" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Input Data Beras</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <form action="#" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                            <div class="mb-4">
                                <label class="form-label" for="jenis_beras">Jenis Beras</label>
                                <select class="form-select" id="jenis_beras" name="jenis_beras" size="1">
                                    <option value="1">Support</option>
                                    <option value="2">Billing</option>
                                    <option value="3">Management</option>
                                    <option value="4">Feature Request</option>
                                </select>
                            </div>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="contact1-firstname">Harga</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa fa-rupiah-sign"></i>
                                        </span>
                                        <input type="text" class="form-control text-center" id="example-group2-input3"
                                            name="example-group2-input3" placeholder="..">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="contact1-lastname">Berat</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa fa-weight-hanging"></i>
                                        </span>
                                        <input type="text" class="form-control text-center" id="example-group2-input3"
                                            name="example-group2-input3" placeholder="..">
                                        <span class="input-group-text">/Kg</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="7" placeholder="Masukkan Deskripsi Beras.."></textarea>
                                <div class="form-text text-muted">Feel free to use common tags: &lt;blockquote&gt;,
                                    &lt;strong&gt;, &lt;em&gt;</div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-paper-plane opacity-50 me-1"></i> Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END large Modal -->


@endsection

@push('css')
@endpush

@push('js')
@endpush
