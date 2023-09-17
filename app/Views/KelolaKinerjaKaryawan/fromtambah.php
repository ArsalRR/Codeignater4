<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>


<?php 
// koneksi
$conn = mysqli_connect("localhost","root","","penjualan-batik");
$data_karyawan = "SELECT id_karywan, nama FROM data_karyawan";
$result = mysqli_query($conn,$data_karyawan);
$jsArray = 'var nama = new Array();';
?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Input Data Kinerja Karyawan</h4>
        <p class="card-description">
            Inputkan Sesuai Data
        </p>
        <?= $validation->listErrors(); ?>
        <form class="forms-sample" action="/KKINERJA_KAR/simpandata" method="post">
            <div class="form-group">
                <!-- nama -->
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
                    <?php } ?>
                    <?php } ?>
                </datalist>
            </div>

            <div class="form-group">
                <label for="nama_karyawan">Nama Karyawan</label>
                <input type="text" name="nama" id="nama" class="form-control form-control-sm bg-light" readonly>
            </div>

            <!-- hasil kerja -->
            <div class="form-group">
                <label for="hasil_kerja">Hasil Kerja</label>
                <select name="hasil_kerja" class="form-control" id="hasil_kerja">
                    <option selected disabled>--Pilih--</option>
                    <option value="SB">Sangat Baik</option>
                    <option value="B">Baik</option>
                    <option value="K">Kurang</option>
                </select>
            </div>

            <!-- peng kerja -->
            <div class="form-group">
                <label for="pengetahuan_pekerjaan">Pengetahuan Pekerjaan</label>
                <select name="pengetahuan_pekerjaan" class="form-control" id="hasil_kerja">
                    <option selected disabled>--Pilih--</option>
                    <option value="SB">Sangat Baik</option>
                    <option value="B">Baik</option>
                    <option value="K">Kurang</option>
                </select>
            </div>

            <!-- absensi -->
            <div class="form-group">
                <label for="disiplin_absensi">Displin Absensi</label>
                <select name="disiplin_absensi" class="form-control" id="disiplin_absensi">
                    <option selected disabled>--Pilih--</option>
                    <option value="SB">Sangat Baik</option>
                    <option value="B">Baik</option>
                    <option value="K">Kurang</option>
                </select>
            </div>

            <!-- report -->
            <div class="form-group">
                <label for="exampleInputPassword1">Report</label>
                <select name="total" class="form-control" id="total">
                    <option selected disabled>--Pilih--</option>
                    <option value="SB">Sangat Baik</option>
                    <option value="B">Baik</option>
                    <option value="K">Kurang</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a href="/KKINERJA_KAR" class="btn btn-light">Kembali</a>
        </form>
    </div>
</div>

<script>
<?php echo $jsArray; ?>

function changeValue(id_karywan) {
    document.getElementById("nama").value = nama[id_karywan].nama;
};
</script>

<?= $this->endSection() ?>