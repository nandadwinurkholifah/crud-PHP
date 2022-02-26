<?php
	session_start();
	require_once('database/koneksi.php');
	header("Content-Type: application/xls");
	header("Content-Disposition: attachment; filename=mahasiswa.xls");
?>
<table>
	<thead>
		<tr>
			<th>No</th>
			<th>NIM</th>
			<th>Nama</th>
			<th>Prodi</th>
			
		</tr>
	</thead>
	<tbody>

		<?php
		$mahasiswa = $openServer->query("SELECT * FROM mahasiswa ORDER BY nama ASC")->fetch_all(MYSQLI_ASSOC);
		?>

		<?php
			$no = 1;
			
			foreach ($mahasiswa as $row):
		?>
			<tr align="center">
				<td><?php echo $no++; ?></td>
				<td><?php echo $row['nim']; ?></td>
				<td><?php echo $row['nama']; ?></td>
				<td><?php echo $row['prodi']; ?></td>
			</tr>
		<?php endforeach ?>
		
	</tbody>
</table>