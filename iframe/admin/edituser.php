<?php 
	session_start();
	include '../../konek.php';

	$query_guru = "SELECT NAMA_WALI, NIP FROM wali_kelas";
	$hasil = mysqli_query($conn, $query_guru);
	$hasil2 = mysqli_query($conn, $query_guru);
	$query_siswa = "SELECT NAMA_SISWA, NIS FROM siswa";
	$result = mysqli_query($conn, $query_siswa);	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
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
    		<form id="guru" action="editguru.php" method="post" style="display: block;" role="form">
    			<div class="form-group">
    				<label for="Nama Guru">Daftar Guru</label>
    				<!--<input type="text" class="form-control" placeholder="Nama Lengkap(guru)" name="nama">-->
    				<select class="form-control" name="nip">
    					<?php while ($row = mysqli_fetch_array($hasil)) {?>
    						<option <?php echo "value='".$row['NIP']."'"; ?>><?php echo "".$row['NAMA_WALI']." (".$row['NIP'].")"; ?></option><?php
    						
    					} ?>
    				</select>
    			</div>

    			<div class="form-group">
    				<label>Nama Lengkap</label>
    				<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
    			</div>
    			<div class="form-group">
    			<label>Jenis Kelamin</label>
    			<div class="radio">
  					<label>
    				<input type="radio" name="jk" value="Laki-laki" checked>
    				Laki-laki
  					</label>
				</div>
				</div>
				<div class="form-group">
				<div class="radio">
  					<label>
    				<input type="radio" name="jk" value="Perempuan">
    				Perempuan
  					</label>
				</div>
				</div>
				<div class="form-group">
					<label>Alamat</label>
    				<textarea class="form-control" rows="3" name="alamat" placeholder="Alamat ex:Jl.Raya Taman"></textarea>
    			</div>
    			<div class="form-group">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-success" value="Submit">
						</div>
					</div>
				</div>
    		</form>
    		<form id="siswa" action="editsiswa.php" method="post" style="display: none;" role="form">
    			<div class="form-group">
    				<label for="Nama Siswa">Daftar Siswa</label>
    				<!--<input type="text" class="form-control" placeholder="Nama Lengkap(siswa)" name="nama">-->
    				<select class="form-control" name="nis">
    					<?php while ($row = mysqli_fetch_array($result)) {?>
    						<option <?php echo "value='".$row['NIS']."'"; ?>><?php echo "".$row['NAMA_SISWA']." (".$row['NIS'].")"; ?></option><?php
    						
    					} ?>
    				</select>
    			</div>
    			<div class="form-group">
    				<label for="Nama Siswa">Daftar Wali Kelas</label>
    				<!--<input type="text" class="form-control" placeholder="Nama Lengkap(siswa)" name="nama">-->
    				<select class="form-control" name="nip">

    					<?php while ($row = mysqli_fetch_array($hasil2)) {?>
    						<option <?php echo "value='".$row['NIP']."'"; ?>><?php echo "".$row['NAMA_WALI']." (".$row['NIP'].")"; ?></option><?php
    						
    					} ?>
    				</select>
    			</div>
    			<div class="form-group">
    				<label>Nama Lengkap</label>
    				<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
    			</div>
    			<div class="form-group">
    			<label>Jenis Kelamin</label>
    			<div class="radio">
  					<label>
    				<input type="radio" name="jk" value="Laki-laki" checked>
    				Laki-laki
  					</label>
				</div>
				</div>
				<div class="form-group">
				<div class="radio">
  					<label>
    				<input type="radio" name="jk" value="Perempuan">
    				Perempuan
  					</label>
				</div>
				</div>
				<div class="form-group">
					<label>Alamat</label>
    				<textarea class="form-control" rows="3" name="alamat" placeholder="Alamat ex:Jl.Raya Taman"></textarea>
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
		$('#link-guru').click(function(event) {
			$('#link-siswa').removeClass('active');
			$(this).addClass('active');
			$('#siswa').fadeOut(200);
			$('#guru').delay(300).fadeIn(700);
			event.preventDefault();
		});

		$('#link-siswa').click(function(event) {
			$('#link-guru').removeClass('active');
			$(this).addClass('active');
			$('#guru').fadeOut(200);
			$('#siswa').delay(300).fadeIn(700);
			event.preventDefault();
		});
	});
</script>
</body>
</html>

