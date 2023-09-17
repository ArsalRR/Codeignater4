<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Input Data Jadwal Produksi</h4>
    <p class="card-description">
      Inputkan Sesuai Data
    </p>
    <?= $validation->listErrors(); ?>
    <form class="forms-sample" action="/JP/simpan" method="post">
      <div class="form-group">
        <label for="exampleInputUsername1">Nama Produk</label>
        <input type="text" class="form-control <?= (isset(session()->get('validation')['nama_produk'])) ? 'is-invalid' : '' ?>" id="exampleInputUsername1" placeholder="Nama Produk" name="nama_produk" autofocus>
        <?php if (isset(session()->get('validation')['nama_produk'])) : ?>
          <div id="validationServer03Feedback" class="invalid-feedback">
            <?= session()->get('validation')['nama_produk']; ?>
          </div>
        <?php endif ?>
      </div>
      <div class="form-group">
        <label for="exampleInputUsername1">Tanggal Mulai Produksi</label>
        <input type="date" class="form-control <?= (isset(session()->get('validation')['tgl_ml_pd'])) ? 'is-invalid' : '' ?>" id="exampleInputUsername1" placeholder="Tanggal Mulai Produksi" name="tgl_ml_pd" autofocus>
        <?php if (isset(session()->get('validation')['tgl_ml_pd'])) : ?>
          <div id="validationServer03Feedback" class="invalid-feedback">
            <?= session()->get('validation')['tgl_ml_pd']; ?>
          </div>
        <?php endif ?>
      </div>
      <div class="form-group">
        <label for="exampleInputUsername1">Tanggal Selesai Produksi</label>
        <input type="date" class="form-control <?= (isset(session()->get('validation')['tgl_sl_pd'])) ? 'is-invalid' : '' ?>" id="exampleInputUsername1" placeholder="Nama Produk" name="tgl_sl_pd" autofocus>
        <?php if (isset(session()->get('validation')['tgl_sl_pd'])) : ?>
          <div id="validationServer03Feedback" class="invalid-feedback">
            <?= session()->get('validation')['tgl_sl_pd']; ?>
          </div>
        <?php endif ?>
      </div>
      <button type="submit" class="btn btn-primary mr-2">Submit</button>
      <a href="/JP" class="btn btn-light">Kembali</a>
    </form>
  </div>
</div>
<?= $this->endSection() ?>