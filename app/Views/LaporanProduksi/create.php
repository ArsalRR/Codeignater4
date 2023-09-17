<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title text-center">Input Data Laporan Produksi</h4>
        <p class="card-description text-center">
            Inputkan Sesuai Data
        </p>
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="container">
                        <form action="/LP/simpan" method="POST">
                            <?= csrf_field(); ?>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Nama Produk</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="exampleFormControlSelect1" name="id_jadwal">
                                        <option value="">-- Pilih Nama Produk -- </option>
                                        <?php foreach ($jadwals as $jadwal) : ?>
                                            <option value="<?= $jadwal['id'] ?>"><?= $jadwal['nama_produk'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                        </div>
                            <div class="row mb-3">
                                <label for="cover" class="col-sm-2 col-form-label">Bulan Input laporan</label>
                                <div class="col-sm-10">
                                <select class="form-control" id="exampleFormControlSelect1" name="bulan">
                                        <option value="">-- Pilih Bulan Penginputan -- </option>
                                            <option>Januari</option>
                                            <option>Februari</option>
                                            <option>Maret</option>
                                            <option>April</option>
                                            <option>Mei</option>
                                            <option>Juni</option>
                                            <option>Juli</option>
                                            <option>Agustus</option>
                                            <option>September</option>
                                            <option>Oktober</option>
                                            <option>November</option>
                                            <option>Desember</option>
                                    </select>">
                                </div>
                            </div>
                         
                           <div class="row mt-5">
                           <button type="submit" class="btn btn-primary">Tambah Data</button>
                            <a href="/LP" class="btn btn-secondary ml-2">Kembali</a>
                           </div>
                        </form>


                    </div>
                </div>
            </div>
    </div>
    <?= $this->endSection() ?>