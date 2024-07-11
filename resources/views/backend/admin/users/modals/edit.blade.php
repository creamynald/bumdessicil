<!-- Edit Modal -->
<div class="modal" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Edit Data @yield('subTitle')</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <form id="edit-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label" for="edit-name">Nama</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa fa-address-book"></i>
                                    </span>
                                    <input type="text" class="form-control" id="edit-name" name="name"
                                        placeholder="Nama">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="edit-email">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control text-center" id="edit-email"
                                        name="email" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 float-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-paper-plane opacity-50 me-1"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Edit Modal -->
