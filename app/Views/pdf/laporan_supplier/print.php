<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan pembelian <?= date("Y-m-d") ?></title>
</head>

<body>
    <div class="text-center" style="border-bottom: 1px solid #fff;">
        <h2>Laporan Pembelian</h2>
        <?php if ($isFilter) : ?>
            <div class="mb-3">
                <span>Filter : </span><span><?= $tanggal_awal ?></span> - <span><?= $tanggal_akhir ?></span>
            </div>
        <?php endif ?>
    </div>
    <br>
    <table class="table table-bordered " id="DATATABLE">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Bahan</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Tanggal Masuk</th>
                <th scope="col">Harga Satuan</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Supplier</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($pembelians as $pembelian) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $pembelian['nama_bahan'] ?></td>
                    <td><?= $pembelian['jumlah'] ?></td>
                    <td><?= $pembelian['tgl_masuk'] ?></td>
                    <td><?= $pembelian['harga_satuan'] ?></td>
                    <td><?= $pembelian['total_harga'] ?></td>
                    <td><?= $pembelian['nama_supplier'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </div>
</body>
</html>