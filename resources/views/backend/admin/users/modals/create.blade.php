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
                    <form action="{{ route('list-bumdes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label" for="add-name">Nama</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa fa-address-book"></i>
                                    </span>
                                    <input type="text" class="form-control" id="add-name" name="name"
                                        placeholder="Nama">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="add-phone">Role</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <select class="form-select" id="add-role" name="role">
                                        <option value="bumdes">Bumdes</option>
                                        <option value="customer">Customer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mt-2">
                                <label class="form-label" for="add-email">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control text-center" id="add-email" name="email"
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class="col-6 mt-2">
                                <label class="form-label" for="add-password">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock
                                        "></i>
                                    </span>
                                    <input type="password" class="form-control" id="add-password" name="password"
                                        placeholder="Password">
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
