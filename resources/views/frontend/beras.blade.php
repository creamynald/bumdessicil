
<div class="bg-body-light">
    <div class="content content-full">
        <div class="py-5 text-center">
            <h3 class="fw-bold mb-2">Beras di Badan Usaha Milik Desa Siak Kecil</h3>
            <h4 class="fw-normal text-muted mb-0">Content..</h4>
            {{-- row semua beras dari setiap bumdes --}}
            <div class="row">
                @foreach ($daftarBeras as $row)
                    <div class="col-md-2 col-xl-4">
                        <!-- Beras -->
                        <div class="block block-rounded">
                            <div class="block-content p-0 overflow-hidden">
                                <a class="img-link" href="be_pages_real_estate_listing.html">
                                    @if ($row->foto)
                                        <img class="img-fluid rounded-top" src="{{ asset($row->foto) }}"
                                            alt="{{ $row->jenisBeras->nama }}">
                                    @else
                                        <img class="img-fluid rounded-top"
                                            src="{{ asset('assets/media/photos/no_image.svg') }}"
                                            alt="Foto tidak tersedia">
                                    @endif
                                </a>
                            </div>
                            <div class="block-content border-bottom">
                                <h4 class="fs-5 mb-2">
                                    <a class="text-dark"
                                        href="be_pages_real_estate_listing.html">{{ $row->jenisBeras->nama }}</a>
                                </h4>
                                <h5 class="fs-1 fw-light mb-1 text-primary">Rp. {{ $row->harga }}/Kg
                                </h5>
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
                                    <div class="col-7">
                                        <button class="btn btn-sm btn-primary w-100 edit-btn"
                                            data-bs-toggle="modal" data-bs-target="#edit-modal"
                                            data-id="{{ $row->id }}"
                                            data-jenis-beras-id="{{ $row->jenis_beras_id }}"
                                            data-harga="{{ $row->harga }}"
                                            data-berat="{{ $row->berat }}"
                                            data-deskripsi="{{ $row->deskripsi }}"
                                            data-foto="{{ $row->foto }}">
                                            <i class="fa fa-edit"></i>
                                            Beli
                                        </button>
                                    </div>
                                    <div class="col-5">
                                        <button class="btn btn-sm btn-alt-warning w-100 delete-btn"
                                            data-id="{{ $row->id }}">
                                            <i class="fa fa-shopping-cart"></i>
                                            Keranjang
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Beras -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>