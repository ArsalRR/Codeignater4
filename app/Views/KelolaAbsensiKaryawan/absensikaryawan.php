<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>
<div class="container">
    <h1>Absensi Karyawan</h1>
    <a href="/KABSENSI_KAR/formtambah" class="btn btn-primary">Tambah data</a>

    <table class="table table-striped table-responsive text-center">
        <thead>
            <tr>
                <th>ID Karyawan</th>
                <th>Nama</th>
                <th>Posisi</th>
                <th>Jam Masuk</th>
                <th>Jam Kerja</th>
                <th>Tanggal Kerja</th>
                <th>Jam Pulang</th>
                <th>Status Kehadiran</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tampildata as $k) : ?>
            <tr>
                <td><?= $k['id_karyawan']; ?></td>
                <td><?= $k['nama']; ?></td>
                <td><?= $k['posisi']; ?></td>
                <td><?= $k['jam_masuk']; ?></td>
                <td><?= $k['jam_kerja']; ?></td>
                <td><?= $k['tanggal_kerja']; ?></td>
                <td><?= $k['jam_pulang']; ?></td>
                <td><?= $k['status_kehadiran']; ?></td>
                <td><a href="/KABSENSI_KAR/fromedit/<?= $k['id'] ?>" class="btn btn-primary">Edit</a>
                    <a href="/KABSENSI_KAR/delete/<?= $k['id']; ?>" class="btn btn-danger"
                        onclick="return confirm('Apakah anda yakin akan menghapus data?');">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
