<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>
<?php if (session()->getFlashdata('pesan')) : ?>
  <div class="alert alert-success" role="alert">
    <?= session()->getFlashdata('pesan'); ?>
  </div>
<?php endif; ?>
<h1 class="text-center">Laporan Gudang</h1>
<button onclick="window.print()" class="btn btn-primary mb-2"><i class="ti-printer text-white"></i></button>
<table id="myTable" class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Jumlah Masuk</th>
      <th scope="col">Jumlah Keluar</th>
      <th scope="col">Tanggal Penerima</th>
      <th scope="col">Tanggal Keluar</th>
      <th scope="col">Kondisi Produk</th>
      <th scope="col">Harga</th>
    </tr>
  </thead>
  <tbody>

  <?php $i=1; $totalHarga = 0; foreach($tampildata as $t):?>
    <tr>
      <th scope="row"><?= $i++ ?></th>
      <td><?= $t['nama_produk'] ?></td>
      <td><?= $t['jumlahmasuk'] ?></td>
      <td><?= $t['jumlahkeluar'] ?></td>
      <td><?= $t['tanggal_masuk'] ?></td>
      <td><?= $t['tanggal_keluar'] ?></td>
      <td><?= $t['kondisi_produk'] ?></td>
      <td>Rp. <?= $t['harga_satuan'] ?></td>
    </tr>
    <?php 
      // Menghitung total harga
      $totalHarga += $t['harga_satuan'];
    ?>
  <?php endforeach?>

  <!-- Menampilkan total harga sebagai baris di tabel -->
  <tr>
    <th colspan="7" class="text-right" style="font-size: 15px;">Total Harga:</th>
    <td style="font-size: 15px;"><b>Rp. <?= $totalHarga ?></td></b>
  </tr>

</tbody>
</table>
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script>
  function exportToExcel() {
    // Mendapatkan referensi tabel
    var table = document.getElementById('myTable');
  
    // Membuat workbook baru
    var workbook = XLSX.utils.book_new();
  
    // Membuat worksheet baru
    var worksheet = XLSX.utils.table_to_sheet(table);
  
    // Menambahkan worksheet ke dalam workbook
    XLSX.utils.book_append_sheet(workbook, worksheet, 'Data');
  
    // Menyimpan workbook dalam format Excel
    var excelBuffer = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });
  
    // Membuat file Excel dari buffer
    var blob = new Blob([excelBuffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
  
    // Membuat URL objek untuk file Excel
    var url = URL.createObjectURL(blob);
  
    // Membuka file Excel dalam tab baru
    window.open(url);
  }
</script>

<?= $this->endSection() ?>