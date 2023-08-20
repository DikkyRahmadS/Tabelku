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

                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0"><?= $title ?></h6>
                        <!-- <div class="dropdown mb-2">
                            <button class="btn p-0" type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                <a href="#" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addModal"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">Tambah</span></a>
                            </div>
                        </div> -->
                    </div>
                    <form action="<?= base_url('Tabelku/laporan') ?>" method="post">
                        <input type="hidden" name="aksi" value="tampilkan">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="dari">Dari</label>
                                    <input type="date" class="form-control" id="dari" name="dari" placeholder="Nama penjual">
                                    <?= form_error('dari', '<div class="invalid-feedback">', '</div>') ?>
                                </div>
                                <div class="mb-3">
                                    <label for="sampai">Sampai</label>
                                    <input type="date" class="form-control" id="sampai" name="sampai" placeholder="Nama penjual">
                                    <?= form_error('sampai', '<div class="invalid-feedback">', '</div>') ?>
                                </div>
                                <div class="d-grid gap-2 mx-auto">
                                    <button type="submit" class="btn btn-block  <?= app_web('warna_button') ?>">Tampilkan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- row -->
</div>