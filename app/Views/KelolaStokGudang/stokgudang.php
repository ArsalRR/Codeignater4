<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>
<table class="table">
<h1 class="text-center">Stok Gudang</h1>
  <thead>
    <tr>
      <th class="cell" style="width: 20px; text-align: center;">No</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Jumlah Masuk</th>
      <th scope="col">Jumlah keluar</th>
      <th scope="col">Tanggal Masuk</th>
      <th scope="col">Tanggal keluar</th>
      <th scope="col">Kondisi</th>
      <th scope="col">Harga satuan</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>

    <a href="/KG/formtambah" class="btn btn-primary mb-2">Tambah Data </a>
    <?php $i = 1; ?>
    <?php foreach ($tampildata as $t) : ?>
      <tr>
        <th scope="row"><?= $i++ ?></th>
        <td><?= $t['nama_produk'] ?></td>
        <td><?= $t['jumlahmasuk'] ?></td>
        <td><?= $t['jumlahkeluar'] ?></td>
        <td><?= $t['tanggal_masuk'] ?></td>
        <td><?= $t['tanggal_keluar'] ?></td>
        <td><?= $t['kondisi_produk'] ?></td>
        <td>Rp.<?= $t['harga_satuan'] ?></td>
        <td>
          <a href="/KG/formedit/<?= $t['id_stok'] ?>" class="btn btn-sm btn-primary"><i class="ti-pencil text-white"></i></a>
          <a href="/KG/delete/<?= $t['id_stok'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin?');"><i class="ti-trash text-white"></i></a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<?= $this->endSection() ?>
