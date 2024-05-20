<!-- large Modal -->
<div class="modal" id="modal-large" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Input Data @yield('subTitle')</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <form action="{{ route('jenis-beras.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label" for="nama">Jenis Beras</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa fa-tag"></i>
                                    </span>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Jenis Beras">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="urutan">Urutan</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa fa-sort"></i>
                                    </span>
                                    <input type="number" class="form-control text-center" id="urutan" name="urutan"
                                        placeholder="Urutan">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 float-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-paper-plane opacity-50 me-1"></i> Kirim
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END large Modal -->