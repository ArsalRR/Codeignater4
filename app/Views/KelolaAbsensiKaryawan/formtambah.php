<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>

<?php 
// koneksi
$conn = mysqli_connect("localhost","root","","penjualan-batik");
$data_karyawan = "SELECT id_karywan, nama,posisi FROM data_karyawan";
$result = mysqli_query($conn,$data_karyawan);
$jsArray = 'var nama = new Array();';
$jsArray1 = 'var posisi = new Array();';
?>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Input Absensi Karyawan</h4>
        <p class="card-description">
            Inputkan Sesuai Data
        </p>
        <?= $validation->listErrors(); ?>
        <form class="forms-sample" action="/KABSENSI_KAR/simpandata" method="post">
            <div class="form-group">
                <label for="" class="form-label">ID Karyawan</label>
                <input type="text" name="id_karyawan" class="form-control form-control-sm" list="datalist1"
                    onchange="changeValue(this.value)" required autocomplete="off">
                <datalist id="datalist1">
                    <?php if (mysqli_num_rows($result)) { ?>
                    <?php while (
                        $row = mysqli_fetch_array($result)
                    ) { ?>
                    <option value="<?php echo $row['id_karywan']; ?>"><?php echo $row['nama']; ?>
                    </option>
                    <?php $jsArray .= "nama['" . $row['id_karywan'] . "'] = {nama:'" . addslashes($row['nama']) . "'};"; ?>
                    <?php $jsArray1 .= "posisi['" . $row['id_karywan'] . "'] = {posisi:'" . addslashes($row['posisi']) . "'};"; ?>
                    <?php } ?>
                    <?php } ?>
                </datalist>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Karyawan</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" required
                    readonly>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Posisi</label>
                <input type="text" class="form-control" id="posisi" placeholder="Masukkan Posisi" name="posisi" required
                    readonly>

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Jam Masuk</label>
                <input type="time" class="form-control" id="exampleInputEmail1" placeholder="Tanggal Mulai"
                    name="jam_masuk">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Jam Kerja</label>
                <input type="time" class="form-control" id="exampleInputPassword1" placeholder="Tanggal Selesai"
                    name="jam_kerja">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tanggal Kerja</label>
                <input type="date" class="form-control" id="exampleInputPassword1" placeholder="" name="tanggal_kerja">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Jam Pulang</label>
                <input type="time" class="form-control" id="exampleInputPassword1" placeholder="" name="jam_pulang">
            </div>
            <div class="form-group">
                <label for="status_kehadiran">Status Kehadiran</label>
                <select name="status_kehadiran" class="form-control" id="status_kehadiran">
                    <option selected disabled>--Pilih--</option>
                    <option value="Hadir">Hadir</option>
                    <option value="Tidak Hadir">Tidak Hadir</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a href="/KDATA_KAR" class="btn btn-light">Kembali</a>
        </form>
    </div>
    <script>
    <?php echo $jsArray; ?>
    <?php echo $jsArray1; ?>

    function changeValue(id_karywan) {
        document.getElementById("nama").value = nama[id_karywan].nama;
        document.getElementById("posisi").value = posisi[id_karywan].posisi;
    };
    </script>
    <?= $this->endSection() ?>