<div class="page-content <?= app_tampilan('warna_latar') ?>">
    <style>
        h1 {
            text-align: center;
        }
    </style>
    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('Tabelku/laporan') ?>" method="post" target="_blank">
                        <input type="hidden" name="aksi" value="cetak">
                        <input type="hidden" class="form-control" id="dari" name="dari" value="<?= $val_dari ?>">
                        <input type="hidden" class="form-control" id="sampai" name="sampai" value="<?= $val_sampai ?>">
                        <button type="submit" class="btn  <?= app_web('warna_button') ?> float-end">Cetak</button>
                    </form>
                    <h1>Laporan Pembelian</h1>
                    <h1>UD Bawang Merah Indofood</h1>
                    <h4>Dari Tanggal: <?= $dari ?></h4>
                    <h4>Sampai Tanggal: <?= $sampai ?></h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Penjual</th>
                                <th>Harga</th>
                                <th>Bobot</th>
                                <th>Kualitas</th>
                                <th>Tanggal Pembelian</th>
                                <th>Total Bayar</th>
                            </tr>
                        </thead>
                        <?php if ($laporans) : ?>
                            <?php $total_harga = 0; ?>
                            <?php foreach ($laporans as $key => $laporan) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $laporan['nama_penjual'] ?></td>
                                        <td><?= number_format($laporan['harga_beli'], 2, ',', '.') ?></td>
                                        <td><?= $laporan['bobot'] ?></td>
                                        <td><?= $laporan['kualitas'] ?></td>
                                        <td><?= date('d/m/Y', strtotime($laporan['tanggal_pembelian'])); ?></td>
                                        <td><?= number_format($laporan['total_bayar'], 2, ',', '.') ?></td>
                                    </tr>
                                </tbody>
                                <?php $total_harga += $laporan['total_bayar']; ?>
                            <?php endforeach; ?>
                            <tfoot>
                                <tr>
                                    <th colspan="5" style="text-align: right;">Total :</th>
                                    <th>Rp.<?= number_format($total_harga, 2, ',', '.') ?></th>
                                </tr>
                            </tfoot>
                        <?php else : ?>
                            <tbody>
                                <tr>
                                    <td colspan="6">Tidak ada Laporan</td>
                                </tr>
                            </tbody>
                        <?php endif; ?>
                        <!-- Isi tabel dengan data transaksi sesuai kebutuhan -->
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- row -->
</div>