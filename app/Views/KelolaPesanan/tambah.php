<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>
<a href="<?= base_url('KPE'); ?>" class="btn btn-secondary mb-2">Kembali</a>

<div class="card">
  <div class="card-body">
    <h4 class="card-title"><?= $title; ?></h4>
    <form action="/KPE/add" method="POST">
      <?= csrf_field(); ?>

      <div class="row mb-3">
        <label for="id" class="col-sm-2 col-form-label">Id Pelanggan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control " id="id" name="id">
        </div>
      </div>
      <div class="row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Nama Pelanggan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control " id="nama" name="nama">
        </div>
      </div>
      <div class="row mb-3">
        <label for="invoice" class="col-sm-2 col-form-label">Invoice</label>
        <div class="col-sm-10">
          <input type="text" class="form-control " id="invoice" name="invoice">
        </div>
      </div>
      <div class="row mb-3">
        <label for="produk" class="col-sm-2 col-form-label">Nama Produk</label>
        <div class="col-sm-10">
          <input type="text" class="form-control " id="produk" name="produk">
        </div>
      </div>

      <div class="row mb-3">
        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
          <input type="number" class="form-control " id="harga" name="harga">
        </div>
      </div>

      <div class="row mb-3">
        <label for="qty" class="col-sm-2 col-form-label">QTY</label>
        <div class="col-sm-10">
          <input type="number" class="form-control " id="qty" name="qty">
        </div>
      </div>
      <div class="row mb-3">
        <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
        <div class="col-sm-10">
          <input type="number" class="form-control " id="satuan" name="satuan">
        </div>
      </div>
      <div class="row mb-3">
        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pesanan</label>
        <div class="col-sm-10">
          <input type="datetime-local" class="form-control " id="tanggal" name="tanggal">
        </div>
      </div>
      <div class="row mb-3">
        <label for="status" class="col-sm-2 col-form-label">Status Pesanan</label>
        <div class="col-sm-10">
        <select name="status" class="form-select" aria-label="Default select example">
          <option selected >--Pilih--</option>
          <option value="Terkonfirmasi">Konfirmasi</option>
          <option value="Ditolak">Tolak</option>
        </select>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>
  </div>
</div>
<?= $this->endSection() ?>