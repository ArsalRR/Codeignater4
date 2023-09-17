<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h4>Tambahkan Pembelian</h4>
        <a href="<?= base_url() ?>supplier/pembelian" class="btn btn-info">Kembali</a>
    </div>
    <div class="card-body">
        <form action="<?= base_url() ?>supplier/pembelian" method="POST">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="id_supplier">Supplier</label>
                <select id="id_supplier" name="id_supplier" class="form-control <?= show_error_class('id_supplier') ?>">
                    <option value="">Pilih Supplier</option>
                    <?php foreach ($suppliers as $supplier) : ?>
                        <option value="<?= $supplier['id'] ?>L"><?= $supplier['nama'] ?></option>
                    <?php endforeach ?>
                </select>
                <?= show_error('id_supplier') ?>
            </div>
            <div class="form-group">
                <label for="nama_bahan">Nama Bahan</label>
                <input type="text" id="nama_bahan" name="nama_bahan" class="form-control <?= show_error_class('nama_bahan') ?>" value="<?= old('nama_bahan') ?>">
                <?= show_error('nama_bahan') ?>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" id="jumlah" name="jumlah" class="form-control <?= show_error_class('jumlah') ?>" value="<?= old('jumlah') ?>">
                <?= show_error('jumlah') ?>
            </div>
            <div class="form-group">
                <label for="tgl_masuk">Tanggal Masuk</label>
                <input type="date" id="tgl_masuk" name="tgl_masuk" class="form-control <?= show_error_class('tgl_masuk') ?>" value="<?= old('tgl_masuk') ?>">
                <?= show_error('tgl_masuk') ?>
            </div>
            <div class="form-group">
                <label for="harga_satuan">Harga Satuan</label>
                <input type="number" id="harga_satuan" name="harga_satuan" class="form-control <?= show_error_class('harga_satuan') ?>" value="<?= old('harga_satuan') ?>">
                <?= show_error('harga_satuan') ?>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Simpan</button>
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
</script>
<?= $this->endSection() ?>