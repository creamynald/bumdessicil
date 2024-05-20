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
                    <form action="{{ route('beras.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label" for="jenis_beras_id">Jenis Beras</label>
                            <select class="form-select" id="jenis_beras_id" name="jenis_beras_id" size="1">
                                @foreach ($jenisBeras as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label" for="harga">Harga</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa fa-rupiah-sign"></i>
                                    </span>
                                    <input type="text" class="form-control text-center" id="harga" name="harga"
                                        placeholder="..">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="berat">Berat</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa fa-weight-hanging"></i>
                                    </span>
                                    <input type="text" class="form-control text-center" id="berat" name="berat"
                                        placeholder="..">
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
                        <div class="d-flex justify-content-end mb-4">
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