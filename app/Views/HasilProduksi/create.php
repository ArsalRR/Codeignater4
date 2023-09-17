<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title text-center">Input Data Hasil Produksi</h4>
        <p class="card-description text-center">
            Inputkan Sesuai Data
        </p>
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="container">
                    <form action="/HP/simpan" method="POST">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">Nama Produk</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_jadwal">
         <option value="">-- Pilih Nama Produk -- </option>
                                    <?php foreach ($jadwals as $jadwal) : ?>
                                        <option value="<?= $jadwal['id'] ?>"><?= $jadwal['nama_produk'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="cover" class="col-sm-2 col-form-label">Jumlah Produksi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="cover" name="jumlah_produksi">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="cover" class="col-sm-2 col-form-label">Total Gagal Produksi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="cover" name="jumlah_cacat">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                            <a href="/HP" class="btn btn-secondary ml-2">Kembali</a>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>
    <?= $this->section('script') ?>
    <script>
        <?php if (session()->getFlashdata('alert_success')) : ?>
            Swal.fire(
                'Berhasil',
                '<?= session()->getFlashdata('alert_success') ?>',
                'success'
            )
        <?php endif ?>
        <?php if (session()->getFlashdata('alert_danger')) : ?>
            Swal.fire(
                'Gagal!',
                '<?= session()->getFlashdata('alert_danger') ?>',
                'error'
            )
        <?php endif ?>
    </script>
    <?= $this->endSection() ?>