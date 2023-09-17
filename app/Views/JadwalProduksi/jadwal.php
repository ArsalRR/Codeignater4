<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>

<h1 class="text-center">Jadwal Produksi</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nomer</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Tanggal Mulai Produksi</th>
      <th scope="col">Tanggal Selesai Produksi</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>

    <a href="JP/create" class="btn btn-primary">Tambah data</a>
    <?php
    foreach ($tampildata as $t) : ?>
      <tr>
        <th scope="row"><?= $nohalaman++; ?></th>
        <td><?= $t['nama_produk'] ?></td>
        <td><?= $t['tgl_ml_pd'] ?></td>
        <td><?= $t['tgl_sl_pd'] ?></td>
        <td> <a href="/JP/edit/<?= $t['slug'] ?>" class="btn btn-warning">Edit</a>
          <a href="#" class="btn btn-danger ml-2" id="hapus_jadwal" data-id="<?= $t['id'] ?>">Hapus</a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<div class="float-center">
  <?= $pager->links('jadwal_produksi', 'paging'); ?>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
  $(document).ready(function() {
    $(document).on("click", "#hapus_jadwal", function(e) {
      e.preventDefault()
      Swal.fire({
        title: 'Apakah Anda Yakin',
        text: "Data Yg Dihapus Tidak Bisa Dikembalikan",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Hapus Sekarang!!!'
      }).then((result) => {
        const id = $(this).data('id')
        if (result.isConfirmed) {
          const urlDelete = `<?= base_url() . 'jp/delete/' ?>/${id}`;
          window.location.href = urlDelete
          Swal.fire(
      'Deleted!',
      'Data Berhasil Di hapus',
      'success'
    )
        }
      })
    })
  })
  <?php if (session()->getFlashdata('berhasil')) : ?>
        Swal.fire(
            'Berhasil',
            '<?= session()->getFlashdata('berhasil') ?>',
            'success'
        )
    <?php endif ?>
</script>
<?= $this->endSection() ?>