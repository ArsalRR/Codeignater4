<?= $this->extend("Layout/template") ?>

<?= $this->section("content") ?>
<?php

// Buat variabel untuk menyimpan total_hari_kerja
$total_hari_kerja = 0;
$conn = mysqli_connect("localhost", "root", "", "penjualan-batik");

// Cek apakah tombol submit telah ditekan
if (isset($_GET['tampil'])) {
    $tanggalAwal = $_GET['tanggalAwal'];
    $tanggalAkhir = $_GET['tanggalAkhir'];
    // Menghitung jumlah range tanggal yang dipilih
    $datetimeAwal = new DateTime($tanggalAwal);
    $datetimeAkhir = new DateTime($tanggalAkhir);
    $interval = $datetimeAwal->diff($datetimeAkhir);
    $total_hari_kerja = $interval->days + 1;

    // Menghitung jumlah status_kehadiran = 'Hadir' dalam rentang tanggal
    $query = "SELECT id_karyawan, COUNT(*) as total_hadir FROM absensi_karyawan WHERE status_kehadiran = 'Hadir' AND tanggal_kerja BETWEEN '$tanggalAwal' AND '$tanggalAkhir' GROUP BY id_karyawan";
    $result = mysqli_query($conn, $query);

    $total_hadir = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $total_hadir[$row['id_karyawan']] = $row['total_hadir'];
    }
}

$laporan = mysqli_query($conn,"SELECT DISTINCT id_karyawan,nama,posisi FROM absensi_karyawan")
?>

<div class="container-fluid">
    <h1 class="text-center">Laporan Karyawan</h1>
    <div class="col-lg-7 col-sm-4 col-md-5 ms-2 mb-3">
        <button onclick="window.print()" class="btn btn-primary mb-2"><i class="ti-printer text-white"></i></button>
        <a href="<?= base_url('/KLAP_KAR'); ?>" class="btn btn-secondary mb-2"><i class="ti-reload text-white"></i></a>
    </div>
    <div class="col me-2 pb-3">
        <form method="GET" action="">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tanggalAwal">Tanggal Awal</label>
                        <input type="date" class="form-control" id="tanggalAwal" name="tanggalAwal" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tanggalAkhir">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="tanggalAkhir" name="tanggalAkhir" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="submit" name="tampil" class="btn btn-primary mt-4">Tampilkan Laporan</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Tambahkan judul Laporan dari tanggal [tanggalAwal] sampai [tanggalAkhir] -->
    <?php if (isset($_GET['tampil'])) : ?>
    <?php $tanggalAwal = $_GET['tanggalAwal']; ?>
    <?php $tanggalAkhir = $_GET['tanggalAkhir']; ?>
    <h3 class="text-center">Laporan dari tanggal <?= $tanggalAwal ?> sampai <?= $tanggalAkhir ?></h3>
    <?php endif; ?>

    <table class="table text-center table-bordered mt-4 col-12">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID Karyawan</th>
                <th scope="col">Nama</th>
                <th scope="col">Posisi</th>
                <th scope="col">Persentase Kehadiran</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($laporan as $data) : ?>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $data['id_karyawan'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['posisi'] ?></td>
                <td>
                    <?php
                        $persentase = 0;
                        if (isset($total_hadir[$data['id_karyawan']])) {
                            $persentase = ($total_hadir[$data['id_karyawan']] / $total_hari_kerja) * 100;
                        }
                        echo isset($total_hadir[$data['id_karyawan']]) ? number_format($persentase, 1) . '%' : '0%';
                        ?>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>