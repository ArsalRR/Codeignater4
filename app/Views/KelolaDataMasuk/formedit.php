<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Masuk</h2>

            <form action="/KGDM/update/<?= $stok->idmasuk ?>" method="POST">
               <div class="row mb-3">
                    <label for="id_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-sm-10">
                    <select class="form-control <?= session('errors.nama_produk') ? 'is-invalid' : '' ?>" id="exampleInputUsername1" name="nama_produk" autofocus readonly>
                        <option value="">Pilih Nama Produk</option>
                        <?php foreach ($stok_gudang as $produk) : ?>
                        <option value="<?= $produk['nama_produk']; ?>" <?= (old('nama_produk', $produk['nama_produk']) == $produk['nama_produk']) ? 'selected' : ''; ?>><?= $produk['nama_produk']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (session('errors.nama_produk')) : ?>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= session('errors.nama_produk') ?>
                        </div>
                    <?php endif ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jumlah" name="jumlahmasuk" value="<?= $stok->jumlahmasuk; ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tanggal_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="<?= $stok->tanggal_masuk; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga_satuan" class="col-sm-2 col-form-label">Harga Satuan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" value="<?= $stok->harga_satuan; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kondisi_produk" class="col-sm-2 col-form-label">Kondisi Produk</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="kondisi_produk" name="kondisi_produk">
                            <option value="Baik" <?php if ($stok->kondisi_produk == "Baik") echo "selected"; ?>>Baik</option>
                            <option value="Kurang Baik" <?php if ($stok->kondisi_produk == "Kurang Baik") echo "selected"; ?>>Kurang Baik</option>
                            <option value="Rusak" <?php if ($stok->kondisi_produk == "Rusak") echo "selected"; ?>>Rusak</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->