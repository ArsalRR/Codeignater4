<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>
<div class="container">
    <div class="row">
        <div class="col">
            <?php if (session()->has('success_update')) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success_update') ?></div>
            <?php endif ?>
            <h2 class="my-3">Form Ubah Data Karyawan</h2>

            <form action="/KDATA_KAR/update/<?= $data_karyawan['id']; ?>" method="POST">
                <?= csrf_field(); ?>

                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">ID Karyawan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="id_karyawan" autofocus
                            value="<?= $data_karyawan['id_karywan']; ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penulis" name="nama"
                            value="<?= $data_karyawan['nama']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin">
                            <option value="Laki-laki"
                                <?= ($data_karyawan['jenis_kelamin'] == 'Laki-laki') ? 'selected' : '' ?>>Laki Laki
                            </option>
                            <option value="Perempuan"
                                <?= ($data_karyawan['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Posisi</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="exampleFormControlSelect1" name="posisi">
                            <option value="Karyawan Tetap"
                                <?= ($data_karyawan['posisi'] == 'Karyawan Tetap') ? 'selected' : '' ?>>Karyawan Tetap
                            </option>
                            <option value="Karyawan Kontrak"
                                <?= ($data_karyawan['posisi'] == 'Karyawan Kontrak') ? 'selected' : '' ?>>Karyawan
                                Kontrak</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamt" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamt" name="alamat"
                            value="<?= $data_karyawan['alamat']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="exampleFormControlSelect1" name="status">
                            <option value="Aktif" <?= ($data_karyawan['status'] == 'Aktif') ? 'selected' : '' ?>>Aktif
                            </option>
                            <option value="Tidak Aktif"
                                <?= ($data_karyawan['status'] == 'Tidak Aktif') ? 'selected' : '' ?>>Tidak aktif
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="gaji" class="col-sm-2 col-form-label">Gaji</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="gaji" name="gaji"
                            value="<?= $data_karyawan['gaji']; ?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Ubah Data</button>
                <a href="/KDATA_KAR" class="btn btn-warning mr-3">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>