<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Input tambah data Kelola stok</h4>

    <form class="forms-sample" action="/KG/simpan" method="post" onsubmit="return validateForm()">
      <div class="form-group">
        <label for="id_produk">Kode Produk</label>
        <input type="text" class="form-control" id="id_produk" placeholder="Kode Produk" name="id_produk" value="KDBRG<?= mt_rand(1, 1000) ?>" readonly>
      </div>
      <div class="form-group">
        <label for="exampleInputUsername1">Nama Produk</label>
        <input type="text" class="form-control <?= (isset(session()->get('validation')['nama_produk'])) ? 'is-invalid' : '' ?>" id="exampleInputUsername1" placeholder="Nama Produk" name="nama_produk" autofocus>
        <?php if (isset(session()->get('validation')['nama_produk'])) : ?>
          <div id="validationServer03Feedback" class="invalid-feedback">
            <?= session()->get('validation')['nama_produk']; ?>
          </div>
        <?php endif ?>
      </div>
      <div class="form-group">
        <label for="jumlahMasuk">Jumlah Masuk</label>
        <input type="number" class="form-control" id="jumlahMasuk" placeholder="Jumlah Masuk" name="jumlahmasuk">
      </div>
      <div class="form-group">
        <label for="jumlahKeluar">Jumlah Keluar</label>
        <input type="number" class="form-control" id="jumlahKeluar" placeholder="Jumlah Keluar" name="jumlahkeluar">
      </div>
      <div class="form-group">
        <label for="tanggal_masuk">Tanggal Masuk</label>
        <input type="date" class="form-control" id="tanggal_masuk" placeholder="Tanggal Masuk" name="tanggal_masuk">
      </div>
      <div class="form-group">
        <label for="tanggal_keluar">Tanggal Keluar</label>
        <input type="date" class="form-control" id="tanggal_keluar" placeholder="tanggal_keluar" name="tanggal_keluar">
      </div>
      <div class="form-group">
        <label for="harga_satuan">Harga Satuan</label>
        <input type="text" class="form-control" id="harga_satuan" placeholder="Harga satuan" name="harga_satuan">
      </div>
      <div class="form-group">
        <label for="kondisi_produk" class="col-sm-2 col-form-label">Kondisi Produk</label>
        <div class="col-sm-10">
          <select class="form-control" id="kondisi_produk" name="kondisi_produk" required>
            <option value="">-- Kondisi Produk --</option>
            <option>Baik</option>
            <option>Kurang Baik</option>
            <option>Rusak</option>
          </select>
        </div>
      </div>

      <button type="submit" class="btn btn-primary mr-2">Submit</button>
      <a href="/KG" class="btn btn-light">Kembali</a>
    </form>
  </div>
</div>

<script>
  function validateForm() {
    var jumlahMasuk = parseInt(document.getElementById("jumlahMasuk").value);
    var jumlahKeluar = parseInt(document.getElementById("jumlahKeluar").value);

    if (jumlahKeluar > jumlahMasuk) {
      alert("Jumlah keluar melebihi jumlah masuk.");
      return false; // Prevent form submission
    }

    if (jumlahKeluar === 0) {
      alert("Jumlah keluar harus lebih dari 0.");
      return false; // Prevent form submission
    }

    return true; // Proceed with form submission
  }
</script>

<?= $this->endSection() ?>
