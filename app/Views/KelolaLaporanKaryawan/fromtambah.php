<?= $this->extend('main/layout')?>

<?= $this->section ('judul') ?>
Tambah kategori
<?= $this->endSection('judul')?>

<?= $this->section ('subjudul') ?>
<?= form_button('','<i class="fa fa-backward"> </i> kembali',[
    'class' => 'btn btn-danger',
    'onclick' => "location.href=('".site_url('/KelolaGudang/KelolaStokGudang/stokgudang')."')"
])?>
<?= $this->endSection('subjudul')?>

<?= $this->section ('isi') ?>
<?= form_open('KG/simpandata')?>
<div class="form-group">
    <label for="namastok">Nama Stok Gudang</label>
    <?= form_input('namastok','',[
        'class' => 'form-control',
        'id' => 'namastok',
        'autofocus' =>'true',
        'placeholder' => "isikan nama stok gudang"
    ])
    ?>
        <?= session()->getFlashdata('errorNamaStok') ?>
</div>
<div class="form-group">
    <?= form_submit('','simpan',[
        'class' => 'btn btn-success'
    ])
    ?>
</div>
<?= form_close();?>
<?= $this->endSection('isi')?>
    </thead>
</table>

