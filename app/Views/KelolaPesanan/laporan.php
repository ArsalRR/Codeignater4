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
        <h1>Laporan Pesanan</h1>
		<p>
			Petugas: <?= session()->get('nama_lengkap'); ?><br>
            Dicetak Tanggal : <?php date_default_timezone_set('Asia/Jakarta');echo date('d-m-Y H:i:s'); ?>
			
		</p>
        <table class="table">
            <thead>
            <th>No.</th>
            <th>ID_Pelanggan</th>
            <th>Pelanggan</th>
            <th>Invoice</th>
            <th>Status</th>
            </tr>
            </thead>

            <tbody>
            <?php $i = 1; ?>
            <?php foreach ($tampildata as $t) : ?>
                <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $t['id_produk'] ?></td>
                <td><?= $t['pelangan'] ?></td>
                <td><?= $t['invoice'] ?></td>
                <td><?= $t['status'] ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
	</body>
</html>