<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Input Data Karyawan</h4>
        <p class="card-description">
            Inputkan Sesuai Data
        </p>
        <?= $validation->listErrors(); ?>
        <form class="forms-sample" action="/KDATA_KAR/simpandata" method="post">
            <div class="form-group">
                <label for="exampleInputUsername1">ID Karyawan</label>
                <input type="text"
                    class="form-control <?= (isset(session()->get('validation')['id_karywan'])) ? 'is-invalid' : '' ?>"
                    id="exampleInputUsername1" placeholder="id_karywan" name="id_karywan" autofocus>
                <?php if (isset(session()->get('validation')['id_karywan'])) : ?>
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= session()->get('validation')['id_karywan']; ?>
                </div>
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Karyawan</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama" name="nama">
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin">
                        <option value="">-- Jenis Kelamin -- </option>
                        <option value="Laki-laki">Laki Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 col-form-label">Posisi</label>
                <div class="col-sm-10">
                    <select class="form-control" id="exampleFormControlSelect1" name="posisi">
                        <option value="">-- Posisi Karyawan -- </option>
                        <option>Karyawan Tetap</option>
                        <option>Karyawan Kontrak</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Alamat</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Alamat"
                    name="alamat">
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select class="form-control" id="exampleFormControlSelect1" name="status">
                        <option value="">-- Status -- </option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Gaji</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan gaji"
                    name="gaji">
            </div>



            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a href="/KDATA_KAR" class="btn btn-light">Kembali</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>