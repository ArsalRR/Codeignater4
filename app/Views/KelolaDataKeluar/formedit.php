<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Keluar</h2>

            <form action="/KGDK/update/<?= $stok->idkeluar ?>" method="POST">
                <?= csrf_field(); ?>
                <!-- <div class="row mb-3">
                    <label for="id_produk" class="col-sm-2 col-form-label">Id Produk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id" name="id_produk" autofocus>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        </div>
                    </div>
                </div> -->
                <div class="row mb-3">
                    <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $stok->nama_produk; ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jumlahkeluar" class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jumlahkeluar" name="jumlahkeluar" value="<?= $stok->jumlahkeluar; ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tanggal_keluar" class="col-sm-2 col-form-label">Tanggal Keluar</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" value="<?= $stok->tanggal_keluar; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga" class="col-sm-2 col-form-label">Harga satuan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="harga" name="harga" value="<?= $stok->harga; ?>">
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
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Ubah Data</button>
                <a href="/KGDK" class="btn btn-secondary">Kembali</a>
                </div>
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