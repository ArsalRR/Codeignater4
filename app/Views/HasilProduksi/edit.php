<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <?php if (session()->has('success_update')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success_update') ?></div>
            <?php endif ?>
            <h2 class="my-3">Form Ubah Data Hasil Produksi</h2>

            <form action="/HP/update/<?= $hp['id']; ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $hp['slug']; ?>">
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Jumlah Produksi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="jumlah_produksi" autofocus value="<?= $hp['jumlah_produksi']; ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Jumlah Cacat Produk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penulis" name="jumlah_cacat" value="<?= $hp['jumlah_cacat']; ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
                <a href="/HP" class="btn btn-warning mr-3">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>