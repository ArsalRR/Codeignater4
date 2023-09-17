<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>
<table class="table table-responsive">
    <h1 class="text-center">Kinerja Karyawan</h1>
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Id_karyawan</th>
            <th scope="col">Nama</th>
            <th scope="col">Hasil_kerja</th>
            <th scope="col">Pengetahuan_pekerjaan</th>
            <th scope="col">Disiplin_Absensi</th>
            <th scope="col">Total</th>
            <th scope="col">Aksi</th>

        </tr>
    </thead>
    <tbody>
        <a href="/KKINERJA_KAR/formtambah" class="btn btn-primary">Tambah data</a>
        <?php $i = 1; ?>
        <?php foreach ($tampildata as $t) : ?>
        <tr>
            <th scope="row"><?= $i++ ?></th>

            <td><?= $t['id_karyawan'] ?></td>
            <td><?= $t['nama'] ?></td>
            <td><?= $t['hasil_kerja'] ?></td>
            <td><?= $t['pengetahuan_pekerjaan'] ?></td>
            <td><?= $t['disiplin_absensi'] ?></td>
            <td><?= $t['total'] ?></td>
            <td> <a href="/KKINERJA_kAR/fromedit/<?= $t['id'] ?>" class="btn btn-primary">Edit</a>
                <a href="/KKINERJA_KAR/delete/<?= $t['id']; ?>" class="btn btn-danger"
                    onclick="return confirm('Apakah anda yakin akan menghapus data?');">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?= $this->endSection() ?>