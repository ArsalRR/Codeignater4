<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>
<table class="table">
  <h1 class="text-center">Hasil Produksi</h1>
  <thead>
    <tr>
      <th scope="col">Nomer</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Tanggal Mulai Produksi</th>
      <th scope="col">Jumlah Produksi</th>
      <th scope="col">Jumlah Cacat Produk</th>
      <th scope="col">Total Produksi</th>
      <th scope="col">Keterangan </th>
      <th scope="col">Aksi </th>
   
    </tr>
  </thead>
  <tbody>
    <a href="/HP/create" class="btn btn-primary">Tambah data</a>
  <?php $i=1; foreach($tampildata as $t):?>
    
    <tr>
      <th scope="row"><?=$i++ ?></th>
    <td><?= $t['nama_produk'] ?></td>
      <td><?= $t['tgl_ml_pd'] ?></td>
      <td><?= $t['jumlah_produksi'] ?></td>
      <td><?= $t['jumlah_cacat'] ?></td>
      <td><?= $t['jumlah_sukses'] ?></td>
      <td>
                    <?php if ($t['jumlah_sukses'] < 100) : ?>
                        <div class="badge badge-danger badge-pill">Gagal Produksi</div>
                    <?php else : ?>
                        <div class="badge badge-success badge-pill">Produksi Berhasil</div>
                    <?php endif ?>
                </td>
      <td><a href="/HP/edit/<?= $t['id'] ?>" class="btn  btn-info rounded-circle"><i class="bi bi-pen"></i></a>
      <a href="#" class="btn btn-danger rounded-circle ml-2" id="hapus_hasil" data-id="<?= $t['id'] ?>"><i class="bi bi-trash"></i></a>
    </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
  $(document).ready(function() {
    $(document).on("click", "#hapus_hasil", function(e) {
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
          const urlDelete = `<?= base_url() . 'HP/delete/' ?>/${id}`;
          window.location.href = urlDelete
          Swal.fire(
      'Deleted!',
      'Hasil Produksi Telah Di hapus',
      'success'
    )
        }
      })
    })
  })
  <?php if (session()->getFlashdata('alert_success')) : ?>
        Swal.fire(
            'Berhasil',
            '<?= session()->getFlashdata('alert_success') ?>',
            'success'
        )
    <?php endif ?>
</script>
<?= $this->endSection() ?>