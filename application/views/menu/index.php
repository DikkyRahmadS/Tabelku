<div class="page-content <?= app_tampilan('warna_latar') ?>">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0"><?= $title ?></h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Menu"></div>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Projects</h6>
                        <div class="dropdown mb-2">
                            <button class="btn p-0" type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">Tambah</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <a href="" class="btn <?= app_web('warna_button') ?> mb-3 newMenuModalButton" data-bs-toggle="modal" data-bs-target="#newMenuModal">Add New Menu</a>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= $no ?></th>
                                        <td><?= $m['menu'] ?></td>
                                        <td>
                                            <?php
                                            if ($m['active'] == 1) {
                                                echo "Enebled";
                                            } else {
                                                echo "Disabled";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url("Menu/updateMenu/$m[id]"); ?>" class="badge bg-success updateMenuModalButton" data-bs-toggle="modal" data-bs-target="#newMenuModal" data-id="<?= $m['id'] ?>">Edit</a>
                                            <a href="<?= base_url("Menu/deleteMenu/$m[id]"); ?>" class="badge bg-danger tombol-hapus" data-hapus="Menu">Delete</a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->
</div>
<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="newMenuModalLabel">Tambah menu baru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('menu') ?>" method="post">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="active" name="active" value="1" checked>
                        <label class="custom-control-label" for="active">Aktif?</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn <?= app_web('warna_button') ?>">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>