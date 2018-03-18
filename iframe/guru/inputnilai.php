<?php  
	session_start();
	include '../../konek.php';

	$daftar_siswa = "SELECT * FROM siswa WHERE NIP = '".$_SESSION['nip']."'";
	$query_list = mysqli_query($conn, $daftar_siswa);
	$query_list2 = mysqli_query($conn, $daftar_siswa);

	$data_wali = "SELECT NIP, NAMA_WALI FROM wali_kelas WHERE NIP = '".$_SESSION['nip']."'";
	$query_wali = mysqli_query($conn, $data_wali);
	$row2 = mysqli_fetch_assoc($query_wali);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="panel panel-login">  		
  	<!--<div class="panel-heading" style="text-align: center; font-size: 20px;">Input Nilai Siswa Anda</div>-->
  		<div class="panel-heading">
		<div class="row">
			<div class="col-xs-6">
				<br>
				<a href="#" class="active " id="link-input">Input Nilai</a>
			</div>
			<div class="col-xs-6">
				<br>
				<a href="#" id="link-edit">Edit Nilai</a>
			</div>
		</div>
		</div>
		<hr>
		<div class="panel-body">
		<form method="post" id="input" action="process.php" role="form" style="display: block;">
			<div class="form-group">
    			<label>Nama Guru</label>
    			<input type="text" name="nama_guru" class="form-control" <?php echo "value='".$row2['NAMA_WALI']."( ".$row2['NIP'].")'"; ?> disabled>
  			</div>    
  			<div class="form-group">
    				<label>Nama Siswa</label>
    				<!--<input type="text" class="form-control" placeholder="Nama Lengkap(guru)" name="nama">-->
    				<select class="form-control" name="nis-add" id="nis-add">
    					<?php while ($row = mysqli_fetch_array($query_list)) {?>
    						<option <?php echo "value='".$row['NIS']."'"; ?>><?php echo "".$row['NAMA_SISWA']." (".$row['NIS'].")"; ?></option><?php    						
    					} ?>
    				</select>
    			</div>
  			<div class="form-group">
    			<label>Nilai UTS</label>
    			<input type="number" class="form-control" placeholder="0~100" name="nilai_uts">
  			</div>    
  			<div class="form-group">
    			<label>Nilai UAS</label>
    			<input type="number" class="form-control" placeholder="0~100" name="nilai_uas">
  			</div>    
  			<div class="form-group">
    			<label>Nilai Tugas</label>
    			<input type="number" class="form-control" placeholder="0~100" name="nilai_tugas">
  			</div>
  			<div class="form-group">
    			<label>Nilai Ulangan</label>
    			<input type="number" class="form-control" placeholder="0~100" name="nilai_ulangan">
  			</div>    
  			<div class="form-group">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-success" value="Submit">
					</div>
				</div>
			</div>
		</form>
		<form method="post" id="edit" action="prosesedit.php" role="form" style="display: none;">
			<div class="form-group">
    			<label>Nama Guru</label>
    			<input type="text" name="nama_guru" class="form-control" <?php echo "value='".$row2['NAMA_WALI']."( ".$row2['NIP'].")'"; ?> disabled>
  			</div>    
  			<div class="form-group">
    				<label>Nama Siswa</label>
    				<!--<input type="text" class="form-control" placeholder="Nama Lengkap(guru)" name="nama">-->
    				<select class="form-control" name="nis-edit" id="nis-edit">
    					<?php while ($row = mysqli_fetch_assoc($query_list2)) {?>
    						<option <?php echo "value='".$row['NIS']."'"; ?>><?php echo "".$row['NAMA_SISWA']."( ".$row['NIS'].")"; ?></option>
    						<?php
    					} ?>
    				</select>
    			</div>
  			<div class="form-group">
    			<label>Nilai UTS</label>
    			<input type="number" class="form-control" placeholder="0~100" name="nilai_uts">
  			</div>    
  			<div class="form-group">
    			<label>Nilai UAS</label>
    			<input type="number" class="form-control" placeholder="0~100" name="nilai_uas">
  			</div>    
  			<div class="form-group">
    			<label>Nilai Tugas</label>
    			<input type="number" class="form-control" placeholder="0~100" name="nilai_tugas">
  			</div>
  			<div class="form-group">
    			<label>Nilai Ulangan</label>
    			<input type="number" class="form-control" placeholder="0~100" name="nilai_ulangan">
  			</div>    
  			<div class="form-group">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-success" value="Submit">
					</div>
				</div>
			</div>
		</form>
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
		$('#link-input').click(function(event) {
			$('#link-edit').removeClass('active');
			$(this).addClass('active');
			$('#edit').fadeOut(200);
			$('#input').delay(300).fadeIn(700);
			event.preventDefault();
		});

		$('#link-edit').click(function(event) {
			$('#link-input').removeClass('active');
			$(this).addClass('active');
			$('#input').fadeOut(200);
			$('#edit').delay(300).fadeIn(700);
			event.preventDefault();
		});
	});
</script>
</body>
</html>