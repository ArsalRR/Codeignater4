<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>
<a href="<?= base_url('KPE'); ?>" class="btn btn-secondary mb-2">Kembali</a>

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Konfirmasi Pemesanan</h4>
    <form action="/KPE/update/<?= $kpe->id_produk; ?>" method="POST">
      <?= csrf_field(); ?>

      <div class="row mb-3">
        <label for="id" class="col-sm-2 col-form-label">Id Pelanggan</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control " id="id" name="id" value="<?= $kpe->id_produk; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Nama Pelanggan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control " id="nama" name="nama" value="<?= $kpe->pelangan; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="invoice" class="col-sm-2 col-form-label">Invoice</label>
        <div class="col-sm-10">
          <input type="text" class="form-control " id="invoice" name="invoice" value="<?= $kpe->invoice; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="produk" class="col-sm-2 col-form-label">Nama Produk</label>
        <div class="col-sm-10">
          <input type="text" class="form-control " id="produk" name="produk" value="<?= $kpe->produk; ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
          <input type="number" class="form-control " id="harga" name="harga" value="<?= $kpe->harga; ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label for="qty" class="col-sm-2 col-form-label">QTY</label>
        <div class="col-sm-10">
          <input type="number" class="form-control " id="qty" name="qty" value="<?= $kpe->qty; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
        <div class="col-sm-10">
          <input type="number" class="form-control " id="satuan" name="satuan" value="<?= $kpe->satuan; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pesanan</label>
        <div class="col-sm-10">
          <input type="datetime-local" class="form-control " id="tanggal" name="tanggal" value="<?= $kpe->create_at; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="konfirmasi" class="col-sm-2 col-form-label">Status Pemesanan</label>
        <div class="col-sm-10">
          <select name="status" id="konfirmasi" class="form-control">
            <option>- Pilih -</option>
            <option name="status" value="Terkonfirmasi">Terkonfirmasi</option>
            <option name="status" value="Menunggu Konfirmasi">menunggu Konfirmasi</option>
          </select>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
<?= $this->endSection() ?>