<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h4>Data Supplier</h4>
        <a href="<?= base_url() ?>supplier" class="btn btn-info">Kembali</a>
    </div>
    <div class="card-body">
        <form action="<?= base_url() ?>supplier/update/<?= $supplier['id'] ?>" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
                <label for="kode_supplier">Kode Supplier</label>
                <input type="text" id="kode_supplier" name="kode_supplier" class="form-control <?= show_error_class('kode_supplier') ?>" value="<?= old('kode_supplier') ?  old('kode_supplier') : $supplier['kode_supplier'] ?>">
                <?= show_error('kode_supplier') ?>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control <?= show_error_class('nama') ?>" value="<?= old('nama') ?  old('nama') : $supplier['nama'] ?>">
                <?= show_error('nama') ?>
            </div>
            <div class="form-group">
                <label for="no_hp">Nomer HP</label>
                <input type="number" id="no_hp" name="no_hp" class="form-control <?= show_error_class('no_hp') ?>" value="<?= old('no_hp') ?  old('no_hp') : $supplier['no_hp'] ?>">
                <?= show_error('no_hp') ?>
            </div>
            <div class="form-group">
                <label for="no_hp">Alamat</label>
                <textarea name="alamat" id="alamat" name="alamat" cols="30" rows="10" class="form-control <?= show_error_class('alamat') ?>"><?= old('alamat') ?  old('alamat') : $supplier['alamat'] ?></textarea>
                <?= show_error('alamat') ?>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Update</button>
                <button class="btn btn-danger" type="reset">Reset</button>
            </div>
        </form>
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
    <?php if (session()->getFlashdata('alert_warning')) : ?>
        Swal.fire(
            'Gagal!',
            '<?= session()->getFlashdata('alert_warning') ?>',
            'warning'
        )
    <?php endif ?>
</script>
<?= $this->endSection() ?>