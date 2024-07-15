<div class="bg-body-light">
    <div class="content content-full">
        <div class="py-5 text-center">
            <h3 class="fw-bold mb-2">Daftar Usaha di BUMDes Siak Kecil</h3>
            <h4 class="fw-normal text-muted mb-0">Content..</h4>
            {{-- row semua beras dari setiap bumdes --}}
            <div class="row">
                @foreach ($daftarBeras as $row)
                    <div class="col-md-2 col-xl-4">
                        <!-- Beras -->
                        <div class="block block-rounded">
                            <div class="block-content p-0 overflow-hidden">
                                <a class="img-link" href="{{ route('lihat-beras', $row->id) }}">
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
                                <h4 class="fs-5 mb-3">
                                    <a class="text-dark" href="#">{{ $row->jenisBeras->nama }}</a> <br>
                                    <span class="badge bg-warning">
                                        <i class="fa fa-store"></i>
                                        BUMDes : {{ $row->user->name }}
                                    </span>
                                </h4>
                                <h5 class="fs-1 fw-light mb-1 text-primary">Rp. {{ $row->harga }}/Kg</h5>
                            </div>
                            <div class="block-content border-bottom">
                                <div class="row mb-3">
                                    <div class="col-6 d-flex align-items-center">
                                        <i class="fa fa-fw fa-archive opacity-50 me-2 text-secondary"></i>
                                        <p class="mb-0"><strong>{{ $row->berat }}</strong> Kg</p>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <i class="fa fa-fw fa-tag opacity-50 me-2 text-secondary"></i>
                                        <p class="mb-0">{{ $row->jenisBeras->nama }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="block-content block-content-full">
                                <div class="row g-sm">
                                    <div class="col">
                                        <a href="{{ route('lihat-beras', $row->id) }}"
                                            class="btn btn-sm btn-primary w-100">
                                            <i class="fa fa-fw fa-shopping-cart opacity-50 me-1"></i>
                                            Beli
                                        </a>
                                    </div>
                                    {{-- <div class="col-5">
                                        <button class="btn btn-sm btn-alt-warning w-100 delete-btn" data-id="{{ $row->id }}">
                                            <i class="fa fa-shopping-cart"></i>
                                            Keranjang
                                        </button>
                                    </div> --}}
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
