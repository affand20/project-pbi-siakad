<?php  
	session_start();
	include '../../konek.php';
		
	$nama_siswa = "SELECT NAMA_SISWA FROM siswa WHERE NIS = '".$_GET['NIS']."'";
	$result = mysqli_query($conn, $nama_siswa);
	$row = mysqli_fetch_assoc($result);

	$ambil_nilai = "SELECT * FROM nilai WHERE NIS = '".$_GET['NIS']."'";
	$query = mysqli_query($conn, $ambil_nilai);
	?>

<div class="panel panel-primary">  		
  	<div class="panel-heading" style="text-align: center; font-size: 20px;"><a href="daftarsiswa.php" target="frame"><span aria-hidden="true" style="float: left; color: white;">&laquo;</span></a>Nilai Siswa Anda</div>  		
		<table class="table">
			<tr>
				<th>NIS</th>
				<th>Nama Lengkap</th>
				<th>Nilai Tugas</th>
				<th>Nilai Ulangan</th>	
				<th>Nilai UTS</th>		
				<th>Nilai UAS</th>
			</tr>
			<?php  
				while ($row2 = mysqli_fetch_assoc($query)) {?>
				<tr>
					<td><?php echo($row2['NIS']) ?></td>
					<td><?php echo($row['NAMA_SISWA']) ?></td>
					<td><?php echo($row2['NILAI_TUGAS']) ?></td>
					<td><?php echo($row2['NILAI_ULANGAN']) ?></td>
					<td><?php echo($row2['NILAI_UTS']) ?></td>
					<td><?php echo($row2['NILAI_UAS']) ?></td>					
				</tr><?php
				}
			?>
		</table>
</div>	
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
<script src="../../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.js"></script>