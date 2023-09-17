<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Jadwal Produksi</h2>

            <form action="/JP/update/<?= $produksi['id']; ?>" method="POST">
                <!-- CSRF (Cross Site Request Forgery) merupakan salah satu teknik penetrasi pada celah keamanan website. -->
                <?= csrf_field(); ?>

                <input type="hidden" name="slug" value="<?= $produksi['slug']; ?>">
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul" name="nama_produk" autofocus value="<?= $produksi['nama_produk']; ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Tanggal Mulai Produksi</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="penulis" name="tgl_ml_pd" value="<?= $produksi['tgl_ml_pd']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penerbit" class="col-sm-2 col-form-label">Tanggal Selesai Produksi</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="penerbit" name="tgl_sl_pd" value="<?= $produksi['tgl_sl_pd']; ?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Ubah Data</button>
                <a href="/JP" class="btn btn-warning ml-2">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
