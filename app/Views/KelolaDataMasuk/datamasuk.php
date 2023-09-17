<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>
<table class="table">
<h1 class="text-center">Kolola Data Masuk</h1>
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama produk</th>
      <th scope="col">Jumlah Barang</th>
      <th scope="col">Tanggal masuk</th>
      <th scope="col">Harga satuan</th>
      <th scope="col">Kondisi barang</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <a href="/KGDM/formtambah" class="btn btn-primary">Tambah Data</a>
    <?php $i = 1; ?>
    <?php foreach ($tampildata as $key => $value) : ?>
      <tr>
        <th scope="row"><?= $i++ ?></th>
        <td><?= $value->nama_produk ?></td>
        <td><?= $value->jumlahmasuk ?></td>
        <td><?= $value->tanggal_masuk ?></td>
        <td>Rp.<?= $value->harga_satuan ?></td>
        <td><?= $value->kondisi_produk ?></td>
        <td>
          <a href="/KGDM/edit/<?= $value->idmasuk ?>" class="btn btn-sm btn-primary"><i class="ti-pencil text-white"></a>
          <a href="/KGDM/delete/<?= $value->idmasuk ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin?');"><i class="ti-trash text-white"></a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<?= $this->endSection() ?>
