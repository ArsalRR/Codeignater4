<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>
<a href="<?= base_url('/L'); ?>" class="btn btn-secondary mb-2">Kembali</a>

<div class="card">
  <div class="card-body">
    <h4 class="card-title"><?= $title; ?></h4>
    <form action="/L/add" method="POST">
      <?= csrf_field(); ?>

      <div class="row mb-3">
        <label for="id" class="col-sm-2 col-form-label">Id Pesanan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control " id="id" name="id" oninvalid="this.setCustomValidity('Masukkan ID Pesanan!')" oninput="this.setCustomValidity('')" required>
        </div>
      </div>

      <div class="row mb-3">
        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Laporan</label>
        <div class="col-sm-10">
          <input type="date" class="form-control " id="tanggal" name="tanggal" oninvalid="this.setCustomValidity('Masukkan Tanggal Laporan!')" oninput="this.setCustomValidity('')" required>
        </div>
      </div>

      <div class="row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Nama Pelanggan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control " id="nama" name="nama" oninvalid="this.setCustomValidity('Masukkan Nama Pelanggan!')" oninput="this.setCustomValidity('')" required>
        </div>
      </div>
      <div class="row mb-3">
        <label for="harga" class="col-sm-2 col-form-label">Total Harga</label>
        <div class="col-sm-10">
          <input type="number" class="form-control " id="harga" name="harga" oninvalid="this.setCustomValidity('Masukkan Total Harga!')" oninput="this.setCustomValidity('')" required>
        </div>
      </div>
      <div class="row mb-3">
        <label for="status" class="col-sm-2 col-form-label">Status Pembayaran</label>
        <div class="col-sm-10">
          <input type="text" class="form-control " id="status" name="status" oninvalid="this.setCustomValidity('Masukkan Status Pembayaran!')" oninput="this.setCustomValidity('')" required>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>
  </div>
</div>
<?= $this->endSection() ?>