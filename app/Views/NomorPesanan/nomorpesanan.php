<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>

<h3>Pengiriman Pesanan</h3>
<br>
<!-- Button Tambah -->
<a href="/NP/tambah" class="btn btn-primary">Tambah data</a>
<!-- Tabel -->
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>

                <th scope="col">No.</th>
                <th scope="col">Id_Pesanan</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Alamat Tujuan</th>
                <th scope="col">Ekspedisi</th>
                <th scope="col">Tanggal Pesanan</th>
                <th scope="col">Tanggal Pengiriman</th>
                <th scope="col">Aksi</th>

            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($tampildata as $t) : ?>
                <tr>
                    <th><?= $i++ ?></th>
                    <td><?= $t['id_pesanan'] ?></td>
                    <td><?= $t['nama_pelanggan'] ?></td>
                    <td><?= $t['total_harga'] ?></td>
                    <td><?= $t['alamat_tujuan'] ?></td>
                    <td><?= $t['ekspedisi'] ?></td>
                    <td><?= $t['tgl_pesanan'] ?></td>
                    <td><?= $t['tgl_pengiriman'] ?></td>
                    <td class="text-center d-flex">
                        <a href="<?= base_url('NP/edit/' . $t['id_pesanan']); ?>" class="btn btn-primary btn-sm mx-2">Edit</i></a>

                        <form action=<?= base_url('NP/hapus/' . $t['id_pesanan']); ?>>
                            <button type="submit" onclick="javascript:return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<!-- Flashdata -->
<?php if (session()->getFlashdata('pesan_hapus')) : ?>
    <div class="alert alert-danger my-2 text-center" role="alert">
        <i class="fas fa-check-circle"></i>
        <?= session()->getFlashdata('pesan_hapus'); ?>
    </div>
<?php endif; ?>
<?= $this->endSection() ?>