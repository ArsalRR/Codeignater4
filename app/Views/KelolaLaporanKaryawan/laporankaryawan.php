<?= $this->extend("Layout/template") ?>
<?= $this->section("content") ?>
<div class="row ">
    <div class="col-lg-7 col-sm-4 col-md-5 ms-2">

        <button onclick="window.print()" class="btn btn-primary mb-2"><i class="ti-printer text-white"></i></button>
        <a href="<?= base_url('/KLAP_KAR'); ?>" class="btn btn-secondary mb-2"><i class="ti-reload text-white"></i></a>
    </div>
    <div class="col me-2 pb-3">

        <form class="d-flex" role="search" action="<?= base_url('/KLAP_KAR'); ?>" method="POST">
            <!-- date 1 -->
            <div class="input-group mb-3 mx-2">
                <span class="input-group-text" id="basic-addon1">Dari</span>
                <input type="date" class="form-control" name="tanggal1" aria-label="Username"
                    aria-describedby="basic-addon1" required>
            </div>
            <!-- date 2 -->
            <div class="input-group mb-3 mx-2">
                <span class="input-group-text" id="basic-addon1">Sampai</span>
                <input type="date" class="form-control" name="tanggal2" aria-label="Username"
                    aria-describedby="basic-addon1" required>
            </div>
            <button class="btn btn-primary mb-2" type="submit">Cari</button>
        </form>
    </div>
</div>
<table class="table table-bordered text-center">
    <h4 class="text-center"><?= $title; ?></h4>

    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Posisi</th>
            <th scope="col">Kehadiran</th>
        </tr>
    </thead>
    <tbody>
        <!-- <a href="/KDATA_KAR/formtambahdata" class="btn btn-primary">   data</a> -->
        <!-- jika data kosong -->
        <?php if ($total_hari == 0) : ?>
        <tr>
            <td colspan="9">
                Data tidak ditemukan
            </td>
        </tr>
        <?php
   
    ?>
        <?php $i = 1; ?>
        <?php foreach ($laporan as $t) : ?>
        <tr>
            <th scope="row"><?= $i++ ?></th>
            <td><?= $t['nama'] ?></td>
            <td><?= $t['posisi'] ?></td>
            <td><?= $t; ?></td>
        </tr>
        <?php endforeach ?>
        <?php endif; ?>
    </tbody>
</table>
<?= $this->endSection() ?>