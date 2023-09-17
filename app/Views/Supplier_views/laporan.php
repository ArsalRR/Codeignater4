<?= $this->extend("Layout/template") ?>
<?= $this->section('style') ?>
<link rel="stylesheet" href="<?= base_url() ?>/css/datatables.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/css/dataTables.bootstrap4.min.css">
<?= $this->endSection() ?>
<?= $this->section("content") ?>
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h4>Laporan</h4>
        <div>
            <button class="btn btn-primary" data-toggle="modal" data-target="#filtermodalpembelian">Filter</button>
            <?php if ($isFilter) : ?>
                <a class="btn btn-success" href="<?= base_url() ?>supplier/laporan_print?tanggal_awal=<?= $tanggal_awal ?>&tanggal_akhir=<?= $tanggal_akhir ?>">Cetak</a>
            <?php else : ?>
                <a class="btn btn-success" href="<?= base_url() ?>supplier/laporan_print">Cetak</a>
            <?php endif ?>
        </div>
    </div>
    <div class="card-body">
        <?php if ($isFilter) : ?>
            <div class="mb-3">
                Filter : <span class="badge badge-info"><?= $tanggal_awal ?></span> - <span class="badge badge-info"><?= $tanggal_akhir ?></span><a href="<?= base_url() ?>supplier/laporan" class="btn btn-danger ml-2 btn-sm">Clear</a>
            </div>
        <?php endif ?>
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
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="filtermodalpembelian" tabindex="-1" aria-labelledby="filtermodalpembelianLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filtermodalpembelianLabel">Filter Tanggal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>supplier/laporan" method="get">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tanggal awal</label>
                                <input type="date" class="form-control" name="tanggal_awal" value="<?= $isFilter ? $tanggal_awal : '' ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tanggal akhir</label>
                                <input type="date" class="form-control" name="tanggal_akhir" value="<?= $isFilter ? $tanggal_akhir : '' ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>
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
<?= $this->endSection() ?>