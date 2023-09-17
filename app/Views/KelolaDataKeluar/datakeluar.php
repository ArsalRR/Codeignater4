<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>
<table class="table">
<h1 class="text-center">Kelola Data Keluar</h1>
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama produk</th>
      <th scope="col">Tgl Keluar</th>
      <th scope="col">Harga Satuan</th> 
      <th scope="col">Jml Brg Keluar</th>
      <th scope="col">Kondisi Produk</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <a href="/KGDK/formtambah" class="btn btn-primary">Tambah Data</a>
    <?php $i = 1; ?>
    <?php foreach ($tampildata as $key => $value) : ?>
      <tr>
        <th scope="row"><?= $i++ ?></th>
        <td><?= $value->nama_produk ?></td>
        <td><?= $value->tanggal_keluar ?></td>
        <td>Rp.<?= $value->harga?></td>
        <td><?= $value->jumlahkeluar ?></td>
        <td><?= $value->kondisi_produk?></td>
        <td>
          <a href="/KGDK/edit/<?= $value->idkeluar ?>" class="btn btn-sm btn-primary"><i class="ti-pencil text-white"></a>
          <a href="/KGDK/delete/<?= $value->idkeluar ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin?');"><i class="ti-trash text-white"></a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<?= $this->endSection() ?>
