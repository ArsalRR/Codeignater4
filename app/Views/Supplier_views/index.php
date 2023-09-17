<?= $this->extend("Layout/template") ?>
<?= $this->section('style') ?>
<link rel="stylesheet" href="<?= base_url() ?>/css/datatables.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/css/dataTables.bootstrap4.min.css">
<?= $this->endSection() ?>
<?= $this->section("content") ?>
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h4>Data Supplier</h4>
        <a href="<?= base_url() ?>supplier/create" class="btn btn-primary">Tambah data</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered " id="DATATABLE">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Supplier</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nomer Hp</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($suppliers as $supplier) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $supplier['kode_supplier'] ?></td>
                        <td><?= $supplier['nama'] ?></td>
                        <td><?= $supplier['no_hp'] ?></td>
                        <td><?= $supplier['alamat'] ?></td>
                        <td>
                            <a href="<?= base_url() ?>supplier/edit/<?= $supplier['id'] ?>" class="btn btn-info">Edit</a>
                            <form action="<?= base_url() ?>supplier/delete/<?= $supplier['id'] ?>" onsubmit="return confirm('Apakah anda yakin ?')" method="POST" class="d-inline">
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