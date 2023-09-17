<!doctype html>
<html lang="en">
  <head>
    <title>Cetak Laporan Bulanan</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
<h1 class="text-center">Laporan Produksi PurboKusumo</h1>
<hr>
<hr>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nomer</th>
      <th scope="col">Nama Produksi</th>
      <th scope="col">Tanggal Produksi</th>
      <th scope="col">Tanggal Selesai Produksi</th>
      <th scope="col">Bulan Inputan</th>
      <th scope="col">Total Produksi</th>
      <th scope="col">Total Barang Rusak</th>
      <th scope="col">Total Barang Jadi</th>
      <th scope="col">Keterangan</th>
   
    </tr>
  </thead>
  <tbody>
  <?php $i=1;  foreach($tampildata as $t):?>

    <tr>
      <th scope="row"><?= $i++ ?></th>
      <td><?= $t['nama_produk'] ?></td>
      <td><?= $t['tgl_ml_pd'] ?></td>
      <td><?= $t['tgl_sl_pd'] ?></td>
      <td><?= $t['bulan'] ?></td>
      <td><?= $t['jumlah_produksi'] ?></td>
      <td><?= $t['jumlah_cacat'] ?></td>
      <td><?= $t['jumlah_sukses'] ?></td>
      <td> <?php if ($t['jumlah_sukses'] < 100) : ?>
                        <div class="badge badge-danger badge-pill">Gagal Produksi</div>
                    <?php else : ?>
                        <div class="badge badge-success badge-pill">Berhasil Produksi</div>
                    <?php endif ?>
                  </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>