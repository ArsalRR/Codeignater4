<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>


<!-- Button Tambah -->
<a href="/KPE/cetakLaporan" class="btn btn-primary">Cetak Laporan Pesanan Masuk</a>
<a href="/NP/cetakLaporan" class="btn btn-primary">Cetak Laporan Pengiriman </a>


<!-- Flashdata -->
<?php if (session()->getFlashdata('pesan_hapus')) : ?>
    <div class="alert alert-danger my-2 text-center" role="alert">
        <i class="fas fa-check-circle"></i>
        <?= session()->getFlashdata('pesan_hapus'); ?>
    </div>
<?php endif; ?>
<?= $this->endSection() ?>