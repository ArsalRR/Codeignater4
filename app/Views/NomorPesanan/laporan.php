<html>
	<head>
		<style>
			table {
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			  width: 100%;
			}

			td, th {
			  border: 1px solid #000000;
			  text-align: center;
			  height: 20px;
			  margin: 8px;
			}

		</style>
	</head>
	<body>
		<div style="font-size:64px; color:'#dddddd'"><i>Invoice</i></div>
		<p>
		<i>Batik Purbo Kusumo</i><br>
		Pekalongan, Indonesia
		</p>
		<hr>
		<hr>
		<p></p>
        <h1>Laporan Pengiriman</h1>
		<p>
			Petugas: <?= session()->get('nama_lengkap'); ?><br>
            Dicetak Tanggal : <?php date_default_timezone_set('Asia/Jakarta');echo date('d-m-Y H:i:s'); ?>
			
		</p>
        <table class="table">
        <thead>
            <tr>

                <th scope="col">No.</th>
                <th scope="col">Id_Pesanan</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Alamat Tujuan</th>
                <th scope="col">Ekspedisi</th>
                <th scope="col">Tanggal Pesanan</th>
                <th scope="col">Tanggal Pengiriman</th>


            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($tampildata as $t) : ?>
                <tr>
                    <th><?= $i++ ?></th>
                    <td><?= $t['id_pesanan'] ?></td>
                    <td><?= $t['nama_pelanggan'] ?></td>
                    <td><?= $t['total_harga'] ?></td>
                    <td><?= $t['alamat_tujuan'] ?></td>
                    <td><?= $t['ekspedisi'] ?></td>
                    <td><?= $t['tgl_pesanan'] ?></td>
                    <td><?= $t['tgl_pengiriman'] ?></td>
            
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
	</body>
</html>