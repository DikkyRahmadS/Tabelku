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
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Sub Menu"></div>
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
                        <a href="" class="btn <?= app_web('warna_button') ?> mb-3 newSubMenuModalButton" data-bs-toggle="modal" data-bs-target="#newSubMenuModal">Add New Menu</a>
                        <table class="table table-hover" id="">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">URL</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($subMenu as $sm) : ?>
                                    <tr>
                                        <th scope="row"><?= $no ?></th>
                                        <td><?= $sm['title'] ?></td>
                                        <td><?= $sm['menu'] ?></td>
                                        <td><?= $sm['url'] ?></td>
                                        <td><?= $sm['icon'] ?></td>
                                        <td>
                                            <?php
                                            if ($sm['is_active'] == 1) {
                                                echo "Enebled";
                                            } else {
                                                echo "Disabled";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url("Menu/updateSubMenu/$sm[idsm]"); ?>" class="badge bg-success updateSubMenuModalButton" data-bs-toggle="modal" data-bs-target="#newSubMenuModal" data-id="<?= $sm['idsm'] ?>">Edit</a>
                                            <a href="<?= base_url("Menu/deleteSubMenu/$sm[idsm]"); ?>" class="badge bg-danger tombol-hapus" data-hapus="Sub Menu">Delete</a>
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
<div class="modal fade" id="newSubMenuModal" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="newSubMenuModalLabel">Tambah sub menu baru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('menu/subMenu/') ?>" method="post">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="SubMenu Title">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="menu_id" id="menu_id">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="SubMenu URL">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="SubMenu Icon">
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" checked>
                        <label class="custom-control-label" for="is_active">Active?</label>
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