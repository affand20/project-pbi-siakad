<?php  
	include '../../konek.php';

	$ambil_data_guru = "SELECT * FROM wali_kelas";
	$query_guru = mysqli_query($conn, $ambil_data_guru);

	$ambil_data_siswa = "SELECT * FROM siswa";
	$query_siswa = mysqli_query($conn, $ambil_data_siswa);	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="overflow: auto;">
	<div class="panel panel-login">
		<div class="panel-heading">
		<div class="row">
			<div class="col-xs-6">
				<br>
				<a href="#" class="active " id="link-guru">Guru</a>
			</div>
			<div class="col-xs-6">
				<br>
				<a href="#" id="link-siswa">Siswa</a>
			</div>
		</div>
		</div>
		<hr>
  		<div class="panel-body">
    		<div style="display: block;" id="tabel-guru">
    			<table class="table">
    				<tr>
    					<th>NIP</th>
    					<th>Nama Lengkap</th>
    					<th>Jenis Kelamin</th>    					
    					<th>Alamat</th>
    				</tr>
    				<?php while ($row = mysqli_fetch_array($query_guru)) {?>
    					<tr>
    						<td><?php echo($row['NIP']) ?></td>
    						<td><?php echo($row['NAMA_WALI']) ?></td>
    						<td><?php echo($row['JK_WALI']) ?></td>
    						<td><?php echo($row['ALAMAT_WALI']) ?></td>
    					</tr><?php
    				} ?>
    			</table>
    		</div>
    		<div style="display: none;" id="tabel-siswa">
    			<table class="table">
    				<tr>
    					<th>NIS</th>
    					<th>Nama Lengkap</th>
    					<th>Jenis Kelamin</th>    					
    					<th>Alamat</th>
    					<th>Wali Kelas</th>
    				</tr>
    				<?php while ($row = mysqli_fetch_array($query_siswa)) {?>
    					<tr>
    						<td><?php echo($row['NIS']) ?></td>
    						<td><?php echo($row['NAMA_SISWA']) ?></td>
    						<td><?php echo($row['JK_SISWA']) ?></td>
    						<td><?php echo($row['ALAMAT_SISWA']) ?></td>
    						<?php 
    						$namawali = "SELECT NAMA_WALI FROM wali_kelas WHERE NIP = '".$row['NIP']."'";
    						$query2 = mysqli_query($conn,$namawali);
    						$row2 = mysqli_fetch_assoc($query2);
    						?>
    						<td><?php echo($row2['NAMA_WALI']) ?></td>
    					</tr><?php
    				} ?>
    			</table>
    		</div>
  		</div>
	</div>

<style type="text/css">	
	.panel-heading{
		text-align: center;
		color: #00415d;			
	}		
	.panel-heading a{
		font-size: 20px;
		color: black;
		text-decoration: none;
		transition: all 0.1s linear;
	}
	.panel-heading a:hover{
		text-decoration: none;
		color: #32cd32;								
	}
	
	.panel-heading .active{
		text-decoration: none;
		color: #32cd32;						
		font-size: 30px;
		font-weight: bold;
	}

	.form input[type="text"]{
		transition: all 0.1s linear;		
	}

</style>
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
<script src="../../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.js"></script>
<script type="text/javascript">
	$(function(){
		$('#link-guru').click(function(event) {
			$('#link-siswa').removeClass('active');
			$(this).addClass('active');
			$('#tabel-siswa').fadeOut(200);
			$('#tabel-guru').delay(300).fadeIn(700);
			event.preventDefault();
		});

		$('#link-siswa').click(function(event) {
			$('#link-guru').removeClass('active');
			$(this).addClass('active');
			$('#tabel-guru').fadeOut(200);
			$('#tabel-siswa').delay(300).fadeIn(700);
			event.preventDefault();
		});
	});
</script>
</body>
</html>
	