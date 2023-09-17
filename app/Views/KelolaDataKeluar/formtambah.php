<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Input tambah data Keluar</h4>
  
    <form class="forms-sample" action="/KGDK/simpan" method="post">
       <div class="form-group">
        <label for="exampleInputUsername1">Nama Produk</label>
        <select class="form-control <?= session('errors.nama_produk') ? 'is-invalid' : '' ?>" id="exampleInputUsername1" name="nama_produk" autofocus>
          <option value="">Pilih Nama Produk</option>
          <?php foreach ($stok_gudang as $produk) : ?>
            <option value="<?= $produk['nama_produk']; ?>"><?= $produk['nama_produk']; ?></option>
          <?php endforeach; ?>
        </select>
        <?php if (session('errors.nama_produk')) : ?>
          <div id="validationServer03Feedback" class="invalid-feedback">
            <?= session('errors.nama_produk') ?>
          </div>
        <?php endif ?>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Tanggal Keluar</label>
        <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Tanggal Keluar" name="tanggal_keluar">
      </div> 
      <div class="form-group">
        <label for="exampleInputUsername3">Harga satuan</label>
        <input type="text" class="form-control <?= session('errors.harga') ? 'is-invalid' : '' ?>" id="exampleInputUsername1" placeholder="Harga Satuan" name="harga" autofocus>
        <?php if (session('errors.harga')) : ?>
          <div id="validationServer03Feedback" class="invalid-feedback">
            <?= session('errors.harga') ?>
          </div>
        <?php endif ?>
      </div>
     <div class="form-group">
        <label for="exampleInputUsername3">Jumlah Barang</label>
        <input type="text" class="form-control <?= session('errors.jumlahkeluar') ? 'is-invalid' : '' ?>" id="exampleInputUsername1" placeholder="jumlah_barangkeluar" name="jumlahkeluar" autofocus>
        <?php if (session('errors.jumlahkeluar')) : ?>
          <div id="validationServer03Feedback" class="invalid-feedback">
            <?= session('errors.jumlahkeluar') ?>
          </div>
        <?php endif ?>
      </div>
      <div class="form-group mb-9">
        <label for="" class="col-sm-2 col-form-label">Kondisi Produk</label>
        <select class="form-control" id="exampleFormControlSelect1" name="kondisi_produk">
          <option value="col-sm-10 col-form-label">-- Kondisi Produk -- </option>
          <option>Baik</option>
          <option>Kurang Baik</option>
          <option>Rusak</option>
        </select>
      </div>
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a href="/KGDK" class="btn btn-dark">Kembali</a>
      </div>
    </form>
  </div>
</div>

<script>
  <?php if (session('error')) : ?>
    alert('<?= session('error') ?>');
  <?php endif ?>
</script>

<?= $this->endSection() ?>
