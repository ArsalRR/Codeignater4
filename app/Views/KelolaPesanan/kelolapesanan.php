<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>

<h3>Pesanan Masuk</h3>
<br>
<a href="/KPE/tambah" class="btn btn-primary">Tambah data</a>
<div class="table-responsive">
  <table class="table">
    <thead>
      <th>No.</th>
      <th>ID_Pelanggan</th>
      <th>Pelanggan</th>
      <th>Invoice</th>
      <th>Status</th>
      <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php $i = 1; ?>
      <?php foreach ($tampildata as $t) : ?>
        <tr>
          <th scope="row"><?= $i++ ?></th>
          <td><?= $t['id_produk'] ?></td>
          <td><?= $t['pelangan'] ?></td>
          <td><?= $t['invoice'] ?></td>
          <td><?= $t['status'] ?></td>
          <td class="text-center d-flex">
            <a href="<?= base_url('KPE/edit/' . $t['id_produk']); ?>" class="btn btn-primary btn-sm mx-2">Lihat Detail</i></a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
<?= $this->endSection() ?>