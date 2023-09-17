<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>
<h1 class="text-center">Laporan Produksi</h1>
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
      <th scope="col">Aksi</th>

    </tr>
  </thead>
  <tbody>

    <a href="/LP/export" class="btn btn-success rounded-circle mr-3"><i class="bi bi-cloud-download"></i></a>
    <a href="/LP/cetak" class="btn btn-warning rounded-circle "><i class="bi bi-printer"></i></a>
    <a href="/LP/create" class="btn btn-primary rounded-circle ml-4"><i class="bi bi-patch-plus"></i></a>

    <?php $i = 1;
    foreach ($tampildata as $t) : ?>
      <tr>
        <th scope="row"><?= $i++ ?></th>
        <td><?= $t['nama_produk'] ?></td>
        <td><?= $t['tgl_ml_pd'] ?></td>
        <td><?= $t['tgl_sl_pd'] ?></td>
        <td><?= $t['bulan'] ?></td>
        <td><?= $t['jumlah_produksi'] ?></td>
        <td><?= $t['jumlah_cacat'] ?></td>
        <td><?= $t['jumlah_sukses'] ?></td>
        <td><button type="button" class="btn btn-info" id="BTN_DETAIL_PRODUK" data-id="<?= $t['id'] ?>">Detail Produk
        <button class="btn btn-danger ml-2" onclick="Swal.fire('Total Barang Jadi harus 100 pcs maka akan Memenuhi target Bulanan')">Target</button>
      </td>
      </tr>
      <div class="modal fade" role="dialog" id="MODAL_DETAIL_PRODUK">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Detail Produk</h5>
            </div>
            <div class="modal-body" id="BODY_MODAL_DETAIL">
            </div>
            <!-- footer modal -->
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        <?php endforeach ?>
  </tbody>
</table>

<!-- Modal -->
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
  $(document).on('click', '#BTN_DETAIL_PRODUK', function(e) {
    e.preventDefault()
    const id = $(this).data('id')
    $("#BODY_MODAL_DETAIL").load('<?= base_url('/api/laporan_produksi/') ?>', {
      id
    });
    $("#MODAL_DETAIL_PRODUK").modal('show')
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