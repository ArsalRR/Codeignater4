<?= $this->extend("Layout/template") ?>
<?= $this->section('style') ?>
<link rel="stylesheet" href="<?= base_url() ?>/css/datatables.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/css/dataTables.bootstrap4.min.css">
<?= $this->endSection() ?>
<?= $this->section("content") ?>
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h4>Data Pembelian</h4>
        <a href="<?= base_url() ?>supplier/create_pembelian_supplier" class="btn btn-primary">Tambah data</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered " id="DATATABLE">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Bahan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Tanggal Masuk</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($pembelians as $pembelian) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $pembelian['nama_bahan'] ?></td>
                        <td><?= $pembelian['jumlah'] ?></td>
                        <td><?= $pembelian['tgl_masuk'] ?></td>
                        <td><?= $pembelian['harga_satuan'] ?></td>
                        <td><?= $pembelian['total_harga'] ?></td>
                        <td><?= $pembelian['nama_supplier'] ?></td>
                        <td>
                            <a href="<?= base_url() ?>supplier/edit_pembelian_supplier/<?= $pembelian['id'] ?>" class="btn btn-info">Edit</a>
                            <form action="<?= base_url() ?>supplier/pembelian/<?= $pembelian['id'] ?>" onsubmit="return confirm('Apakah anda yakin ?')" method="POST" class="d-inline">
                                <?php csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="<?= base_url() ?>js/datatables.min.js"></script>
<script src="<?= base_url() ?>js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $("#DATATABLE").DataTable()
    })
</script>
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