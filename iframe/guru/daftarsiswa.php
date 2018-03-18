<?php  
	session_start();
	include '../../konek.php';

	$ambil_data = "SELECT * FROM siswa WHERE NIP = '".$_SESSION['nip']."'";
	$query = mysqli_query($conn, $ambil_data);	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="overflow: auto;">
<div class="panel panel-primary">  		
  	<div class="panel-heading" style="text-align: center; font-size: 20px;">Daftar Siswa Anda</div>  		
		<table class="table">
			<tr>
				<th>NIS</th>
				<th>Nama Lengkap</th>
				<th>Jenis Kelamin</th>
				<th>Alamat</th>	
				<th>Action</th>		
			</tr>
			<?php  
				while ($row = mysqli_fetch_assoc($query)) {?>
				<tr>
					<td><?php echo($row['NIS']) ?></td>
					<td><?php echo($row['NAMA_SISWA']) ?></td>
					<td><?php echo($row['JK_SISWA']) ?></td>
					<td><?php echo($row['ALAMAT_SISWA']) ?></td>
					<td><?php echo "<a href='daftarnilai.php?NIS=$row[NIS]'>Lihat Nilai</a>" ?></td>
				</tr><?php
				}
			?>
		</table>
</div>
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
<script src="../../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.js"></script>
</body>
</html>