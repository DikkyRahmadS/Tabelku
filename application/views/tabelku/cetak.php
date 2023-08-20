<!DOCTYPE html>
<html>

<head>
    <title><?= $title ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Laporan Pembelian</h1>
    <h1>UD Bawang Merah Indofood</h1>
    <h4>Dari Tanggal: <?= $dari ?></h4>
    <h4>Sampai Tanggal: <?= $sampai ?></h4>
    <table>
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
</body>

</html>
<script>
    // Fungsi untuk melakukan auto print saat halaman selesai diload
    window.onload = function() {
        window.print();
    };
</script>