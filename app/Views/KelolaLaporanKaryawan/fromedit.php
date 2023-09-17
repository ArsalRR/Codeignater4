<?= $this->extend('main/layout')?>

<?= $this->section ('judul') ?>
Tambah kategori
<?= $this->endSection('judul')?>

<?= $this->section ('subjudul') ?>
<?= form_button('','<i class="fa fa-plus-backward"> </i> kembali',[
    'class' => 'btn btn-danger',
    'onclick' => "location.href=('".site_url('/kategori/index')."')"
])?>
<?= $this->endSection('subjudul')?>

<?= $this->section ('isi') ?>
<?= form_open('kategori/updatedata','',[
    'idkategori' =>$id
])?>
<div class="form-group">
    <label for="id_karyawan">Id Produk</label>
    <?= form_input('id_karyawan',$nama,[
        'class' => 'form-control',
        'id' => 'id_karyawan',
        'autofocus' =>'true',
    ])
    ?>
    <?= session()->getFlashdata('errorNamaKategori')?>
</div>
<div class="form-group">
    <?= form_submit('','Update',[
        'class' => 'btn btn-success'
    ])
    ?>
</div>
<?= form_close();?>
<?= $this->endSection('isi')?>
    </thead>
</table>

