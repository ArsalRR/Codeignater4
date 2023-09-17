<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Edit Data Kinerja Karyawan</h4>
        <p class="card-description">
            Inputkan Sesuai Data
        </p>
        <?= $validation->listErrors(); ?>
        <form class="forms-sample" action="/KKINERJA_KAR/update/<?= $kinerja_karyawan['id']; ?>" method="post">
            <div class="form-group">
                <label for="" class="form-label">Karyawan</label>
                <select class="form-control" id="exampleFormControlSelect1" name="id_karyawan" required>
                    <option value="">-- Pilih Karyawan -- </option>
                    <?php foreach ($data_karyawan as $k) : ?>
                        <!-- jika ada id_karyawan = id continue -->
                        <?php if ($k['id'] == $kinerja_karyawan['id_karyawan']) : ?>
                            <option value="<?= $k['id']; ?>" selected><?= $k['nama'];   ?></option>
                            <?php continue; ?>
                        <?php endif ?>
                        <option value="<?= $k['id']; ?>"><?= $k['nama'];   ?></option>


                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Karyawan</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama" name="nama" value="<?= $kinerja_karyawan['nama']; ?>">
            </div>


            <div class="form-group">
                <label for="exampleInputPassword1">Hasil Kerja</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Hasil" name="hasil_kerja" value="<?= $kinerja_karyawan['hasil_kerja']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Pengetahuan Pekerjaan</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Tanggal pengetahuan pekerjaan" name="pengetahuan_pekerjaan" value="<?= $kinerja_karyawan['pengetahuan_pekerjaan']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Displin Absensi</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Absensi" name="disiplin_absensi" value="<?= $kinerja_karyawan['disiplin_absensi']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Total</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Total" name="total" value="<?= $kinerja_karyawan['total']; ?>">
            </div>

            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a href="/KKINERJA_KAR" class="btn btn-light">Kembali</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>