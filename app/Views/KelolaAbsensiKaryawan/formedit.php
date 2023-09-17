<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Edi Absensi Karyawan</h4>
        <p class="card-description">
            Inputkan Sesuai Data
        </p>
        <?= $validation->listErrors(); ?>
        <form class="forms-sample" action="/KABSENSI_KAR/update/<?= $absensi_karyawan['id']; ?>;?>" method="post">
            <div class="form-group">
                <label for="" class="form-label">Karyawan</label>
                <select class="form-control" id="exampleFormControlSelect1" name="id_karyawan" required>
                    <option value="">-- Pilih Karyawan -- </option>
                    <?php foreach ($data_karyawan as $k) : ?>
                    <!-- jika ada id_karyawan = id continue -->
                    <?php if ($k['id'] == $absensi_karyawan['id_karyawan']) : ?>
                    <option value="<?= $k['id']; ?>" selected><?= $k['nama'];   ?></option>
                    <?php continue; ?>
                    <?php endif ?>
                    <option value="<?= $k['id']; ?>"><?= $k['nama'];   ?></option>


                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Karyawan</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama" name="nama"
                    required value="<?= $absensi_karyawan['nama']; ?>">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Posisi</label>
                <select class="form-control" id="exampleFormControlSelect1" name="posisi">

                    <option value="Karyawan Tetap"
                        <?= ($absensi_karyawan['posisi'] == 'Karyawan Tetap') ? 'selected' : ''; ?>>Karyawan Tetap
                    </option>
                    <option <?= ($absensi_karyawan['posisi'] == 'Karyawan Kontrak') ? 'selected' : ''; ?>>Karyawan
                        Kontrak</option>
                </select>

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Jam Masuk</label>
                <input type="time" class="form-control" id="exampleInputEmail1" placeholder="Tanggal Mulai"
                    name="jam_masuk" value="<?= $absensi_karyawan['jam_masuk']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Jam Kerja</label>
                <input type="time" class="form-control" id="exampleInputPassword1" placeholder="Tanggal Selesai"
                    name="jam_kerja" value="<?= $absensi_karyawan['jam_kerja']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tanggal Kerja</label>
                <input type="date" class="form-control" id="exampleInputPassword1" placeholder="" name="tanggal_kerja"
                    value="<?= $absensi_karyawan['tanggal_kerja']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Jam Pulang</label>
                <input type="time" class="form-control" id="exampleInputPassword1" placeholder="" name="jam_pulang"
                    value="<?= $absensi_karyawan['jam_pulang']; ?>">
            </div>

            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a href="/KDATA_KAR" class="btn btn-light">Kembali</a>
        </form>
    </div>
    <?= $this->endSection() ?>