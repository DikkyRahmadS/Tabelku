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
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Berhasil"></div>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTableExample">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal Pembelian</th>
                                    <th scope="col">Nama Penjual</th>
                                    <th scope="col">kualitas</th>
                                    <th scope="col">Harga Beli</th>
                                    <th scope="col">Bobot</th>
                                    <th scope="col">Total Bayar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($pembelians as $pembelian) : ?>

                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= cari_tanggal($pembelian['tanggal_pembelian']) ?></td>
                                        <td><?= $pembelian['nama_penjual'] ?></td>
                                        <td><?= $pembelian['kualitas'] ?></td>
                                        <td>Rp <?= number_format($pembelian['harga_beli'], 2, ',', '.') ?></td>
                                        <td><?= $pembelian['bobot'] ?></td>
                                        <td>Rp <?= number_format($pembelian['total_bayar'], 2, ',', '.') ?></td>
                                        <td>

                                            <a href="#" class="badge bg-success btn-update" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $pembelian['id'] ?>" data-nama_penjual="<?= $pembelian['nama_penjual'] ?>" data-harga_beli="<?= $pembelian['harga_beli'] ?>" data-bobot="<?= $pembelian['bobot'] ?>" data-kualitas="<?= $pembelian['kualitas'] ?>" data-tanggal_pembelian="<?= $pembelian['tanggal_pembelian'] ?>" data-total_bayar="<?= $pembelian['total_bayar'] ?>">Ubah</a>

                                            <a href="<?= base_url("Tabelku/delete/$pembelian[id]"); ?>" class="badge bg-danger tombol-hapus" data-hapus="pembelian">Hapus</a>
                                        </td>
                                    </tr>

                                <?php endforeach ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->
</div>

<!-- Modal Add-->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addModalLabel">Tambah Data pembelian</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('Tabelku/pembelian') ?>" method="post">
                <input type="hidden" name="aksi" value="add">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_penjual">Nama penjual</label>
                        <input type="text" class="form-control" id="nama_penjual" name="nama_penjual" placeholder="Nama penjual">
                        <?= form_error('nama_penjual', '<div class="invalid-feedback">', '</div>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="harga_beli">Harga Beli</label>
                        <input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="Harga Beli">
                        <?= form_error('harga_beli', '<div class="invalid-feedback">', '</div>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="bobot">Bobot</label>
                        <input type="text" class="form-control" id="bobot" name="bobot" placeholder="Bobot">
                        <?= form_error('bobot', '<div class="invalid-feedback">', '</div>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="kualitas">Kualitas</label>
                        <select class="form-control" id="kualitas" name="kualitas" placeholder="Nama penjual">
                            <option value="" selected disabled>Pilih Kualitas</option>
                            <option value="Besar">Besar</option>
                            <option value="Kecil">Kecil</option>
                        </select>
                        <?= form_error('kualitas', '<div class="invalid-feedback">', '</div>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_pembelian">Tanggal Pembelian</label>
                        <input type="date" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian" placeholder="Nama penjual">
                        <?= form_error('tanggal_pembelian', '<div class="invalid-feedback">', '</div>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="total_bayar">Total Bayar</label>
                        <input type="number" class="form-control" id="total_bayar" name="total_bayar" placeholder="Nama penjual">
                        <?= form_error('total_bayar', '<div class="invalid-feedback">', '</div>') ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn  <?= app_web('warna_button') ?>">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Edit Data pembelian</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('Tabelku/pembelian') ?>" method="post">
                <input type="hidden" name="aksi" value="update">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="nama_penjual">Nama penjual</label>
                        <input type="text" class="form-control" id="nama_penjual" name="nama_penjual" placeholder="Nama penjual">
                        <?= form_error('nama_penjual', '<div class="invalid-feedback">', '</div>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="harga_beli">Harga Beli</label>
                        <input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="Harga Beli">
                        <?= form_error('harga_beli', '<div class="invalid-feedback">', '</div>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="bobot">Bobot</label>
                        <input type="text" class="form-control" id="bobot" name="bobot" placeholder="Bobot">
                        <?= form_error('bobot', '<div class="invalid-feedback">', '</div>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="kualitas">Kualitas</label>
                        <select class="form-control" id="kualitas" name="kualitas" placeholder="Nama penjual">
                            <option value="" selected disabled>Pilih Kualitas</option>
                            <option value="Besar">Besar</option>
                            <option value="Kecil">Kecil</option>
                        </select>
                        <?= form_error('kualitas', '<div class="invalid-feedback">', '</div>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_pembelian">Tanggal Pembelian</label>
                        <input type="date" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian" placeholder="Nama penjual">
                        <?= form_error('tanggal_pembelian', '<div class="invalid-feedback">', '</div>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="total_bayar">Total Bayar</label>
                        <input type="number" class="form-control" id="total_bayar" name="total_bayar" placeholder="Nama penjual">
                        <?= form_error('total_bayar', '<div class="invalid-feedback">', '</div>') ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn  <?= app_web('warna_button') ?>">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>
    $(document).on("click", ".btn-update", function() {
        var id = $(this).data('id');
        $(".modal-body  #id").val(id);

        var nama_penjual = $(this).data('nama_penjual');
        $(".modal-body  #nama_penjual").val(nama_penjual);
        var harga_beli = $(this).data('harga_beli');
        $(".modal-body  #harga_beli").val(harga_beli);
        var bobot = $(this).data('bobot');
        $(".modal-body  #bobot").val(bobot);
        var kualitas = $(this).data('kualitas');
        $(".modal-body  #kualitas").val(kualitas);
        var tanggal_pembelian = $(this).data('tanggal_pembelian');
        $(".modal-body  #tanggal_pembelian").val(tanggal_pembelian);
        var total_bayar = $(this).data('total_bayar');
        $(".modal-body  #total_bayar").val(total_bayar);
    });
</script>