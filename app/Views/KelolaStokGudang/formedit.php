<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Masuk</h2>

            <form action="/KG/update/<?= $stok['id_stok']; ?>" method="POST" onsubmit="return validateForm()">
                <!-- CSRF (Cross Site Request Forgery) merupakan salah satu teknik penetrasi pada celah keamanan website. -->
                <?= csrf_field(); ?>

                <input type="hidden" name="slug" value="<?= $stok['id_stok']; ?>"><br>
                <div class="row mb-3">
                    <label for="id_produk" class="col-sm-2 col-form-label">Id Produk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id" name="id_produk" readonly autofocus value="<?= $stok['id_produk']; ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $stok['nama_produk']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jumlahmasuk" class="col-sm-2 col-form-label">Jumlah Masuk</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="jumlahMasuk" name="jumlahmasuk" value="<?= $stok['jumlahmasuk']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jumlahkeluar" class="col-sm-2 col-form-label">Jumlah Keluar</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="jumlahKeluar" name="jumlahkeluar" value="<?= $stok['jumlahkeluar']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tanggal_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="<?= $stok['tanggal_masuk']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tanggal_keluar" class="col-sm-2 col-form-label">Tanggal Keluar</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" value="<?= $stok['tanggal_keluar']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga_satuan" class="col-sm-2 col-form-label">Harga Satuan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" value="<?= $stok['harga_satuan']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kondisi" class="col-sm-2 col-form-label">Kondisi</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="exampleFormControlSelect1" name="kondisi_produk" required>
                            <option value="Baik" <?= ($stok['kondisi_produk'] == 'Baik') ? 'selected' : ''; ?>>Baik</option>
                            <option value="Kurang Baik" <?= ($stok['kondisi_produk'] == 'Kurang Baik') ? 'selected' : ''; ?>>Kurang Baik</option>
                            <option value="Rusak" <?= ($stok['kondisi_produk'] == 'Rusak') ? 'selected' : ''; ?>>Rusak</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
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