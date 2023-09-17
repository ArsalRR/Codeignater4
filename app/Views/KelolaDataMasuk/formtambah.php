<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Input tambah Data Masuk</h4>
  
    <form class="forms-sample" action="/KGDM/simpan" method="post">
      <div class="form-group">
        <label for="exampleInputUsername1">Nama Produk</label>
        <select class="form-control <?= (isset(session()->get('validation')['nama_produk'])) ? 'is-invalid' : '' ?>" id="exampleInputUsername1" name="nama_produk" autofocus>
          <option value="">Pilih Nama Produk</option>
          <?php foreach ($stok_gudang as $produk) : ?>
            <option value="<?= $produk['nama_produk']; ?>"><?= $produk['nama_produk']; ?></option>
          <?php endforeach; ?>
        </select>
        <?php if (isset(session()->get('validation')['nama_produk'])) : ?>
          <div id="validationServer03Feedback" class="invalid-feedback">
            <?= session()->get('validation')['nama_produk']; ?>
          </div>
        <?php endif ?>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Jumlah Masuk</label>
        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Jumlah Masuk" name="jumlahmasuk">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Tanggal Masuk</label>
        <input type="date" class="form-control" id="exampleInputPassword1" placeholder="tanggal_masuk" name="tanggal_masuk">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Harga Satuan</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Harga satuan" name="harga_satuan">
      </div>
      <div class="form-group">
        <label for="" class="col-sm-2 col-form-label">Kondisi Produk</label>
        <div class="col-sm-10">
        <select class="form-control" id="exampleFormControlSelect1" name="kondisi_produk">
        <option value="col-sm-2 col-form-label">-- Kondisi Produk -- </option>
          <option>Baik</option>
          <option>Kurang Baik</option>
          <option>Rusak</option>
        </select>
        </div>
        </div>
      <button type="submit" class="btn btn-primary mr-2">Submit</button>
      <a href="/KGDM" class="btn btn-light">Kembali</a>
    </form>
  </div>
</div>
<?= $this->endSection() ?>
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
        </div>