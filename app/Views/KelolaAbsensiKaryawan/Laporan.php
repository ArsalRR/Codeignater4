<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>
<table class="table table-responsive">
    <h1 class="text-center ">Absensi Karyawan</h1>
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Id_karyawan</th>
            <th scope="col">Nama</th>
            <th scope="col">Posisi</th>
            <th scope="col">Jam_Masuk</th>
            <th scope="col">Jam_Kerja</th>
            <th scope="col">Tanggal_Kerja</th>
            <th scope="col">Jam_Pulang</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <a href="/KABSENSI_KAR/formtambah" class="btn btn-primary">Cetak</a>
        <?php $i = 1; ?>
        <?php foreach ($tampildata as $t) : ?>
        <tr>
            <th scope="row"><?= $i++ ?></th>

            <td><?= $t['id_karyawan'] ?></td>
            <td><?= $t['nama'] ?></td>
            <td><?= $t['posisi'] ?></td>
            <td><?= $t['jam_masuk'] ?></td>
            <td><?= $t['jam_kerja'] ?></td>
            <td><?= $t['tanggal_kerja'] ?></td>
            <td><?= $t['jam_pulang'] ?></td>
            <td><a href="/KABSENSI_KAR/fromedit/<?= $t['id'] ?>" class="btn btn-primary">Edit</a>
                <a href="/KABSENSI_KAR/delete/<?= $t['id']; ?>" class="btn btn-danger"
                    onclick="return confirm('Apakah anda yakin akan menghapus data?');">Hapus</a>
            </td>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?= $this->endSection() ?>