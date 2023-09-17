<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>
<table class="table table-responsive">
    <h1 class="text-center">Data Karyawan</h1>
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Id_karyawan</th>
            <th scope="col">Nama</th>
            <th scope="col">Posisi</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">Status</th>
            <th scope="col">Reward</th>
            <th scope="col">Gaji</th>
            <th scope="col">Total</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <a href="/KDATA_KAR/formtambah" class="btn btn-primary">Tambah data</a>
    <tbody>
        <?php
    $i = 1;
    foreach ($tampildata as $t) : ?>
        <tr>
            <th scope="row"><?= $i++ ?></th>

            <td><?php echo $t['id_karywan'] ?></td>
            <td><?= $t['nama'] ?></td>
            <td><?= $t['posisi'] ?></td>
            <td><?= $t['jenis_kelamin'] ?></td>
            <td><?= $t['alamat'] ?></td>
            <td><?= $t['status'] ?></td>

            <?php 
// Koneksi
$db = mysqli_connect("localhost","root","","penjualan-batik");
$query = $db->query("SELECT total FROM kinerja_karyawan WHERE id_karyawan = '{$t['id_karywan']}'");
$row = $query->fetch_object();

if ($row) {
    $total = $row->total;
    if ($total == 'SB') {
        $reward = 1000000;
    } elseif ($total == 'B') {
        $reward = 500000;
    } elseif ($total == 'K') {
        $reward = 250000;
    } else {
        $reward = 0;
    }
} else {
    $reward = 0;
}
?>


            <td>Rp. <?= $reward ?></td>
            <td>Rp. <?= $t['gaji'] ?></td>
            <?php 
           $total = $reward + $t['gaji'];


            ?>
            <td>Rp. <?= $total ?></td>

            <td><a href="/KDATA_KAR/fromedit/<?= $t['id'] ?>" class="btn btn-primary">Edit</a>
                <a href="/KDATA_KAR/delete/<?= $t['id']; ?>" class="btn btn-danger"
                    onclick="return confirm('Apakah anda yakin akan menghapus data?');">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>