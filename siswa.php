<?php 
	session_start();
	include 'konek.php';
	$_SESSION['nis'] = $_POST['nis'];
	$_SESSION['password'] = $_POST['password'];	

	if ($_SESSION['nis']==null) {
		header("location:landingpage.html");
		session_destroy();
	}
	else{

	$cek_data = "SELECT * FROM SISWA WHERE NIS = '".$_SESSION['nis']."' AND PASSWORD_SISWA = '".$_SESSION['password']."' ";	
	$query = mysqli_query($conn, $cek_data);


	if (mysqli_num_rows($query)<=0) {
		echo "<script>alert('Gagal masuk, data tidak ditemukan. Silakan daftar dulu'); window.location = './landingpage.html';</script>";
		session_destroy();		
	}
	else{
		$row = mysqli_fetch_assoc($query);
		$_SESSION['nama'] = $row['NAMA_SISWA'];
		$_SESSION['nip'] = $row['NIP'];

		$getnamawali = "SELECT * FROM wali_kelas WHERE NIP = '".$_SESSION['nip']."'";
		$query2 = mysqli_query($conn, $getnamawali);
		$namawali = mysqli_fetch_assoc($query2);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Selamat Datang Siswa</title>
</head>
<body>
	<div class="all">				
		<div class="content">
		<div class="left">			
			<div class="foto">
				<p class="img"><img src="img/siswa.png" class="siswa"></p>
			</div>
			<br><br>
			<div class="info">
				<table>
					<tr>
						<td>Nama</td>
						<td><?php echo($_SESSION['nama']) ?></td>
					</tr>
					<tr>
						<td>NIS</td>
						<td><?php echo($_SESSION['nis']) ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td><?php echo($row['JK_SISWA']) ?></td>
					</tr>
					<tr>
						<td>Wali Kelas</td>
						<td><?php echo($namawali['NAMA_WALI']) ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td><?php echo($row['ALAMAT_SISWA']) ?></td>
					</tr> 					
				</table>
			</div>
		</div>
		<div class="center">
			<div class="nvbr">
			<ul class="nav nav-pills">
 	 				<li role="presentation" class="active coba"><a href="iframe/siswa/iframesiswa.php" target="frame">Home</a></li>
  					<li role="presentation" class="coba" id="now"><a href="iframe/siswa/nilai.php" target="frame">Lihat Nilai</a></li>
					<ul id="myTab" class="nav nav-pills">
    					<li class="dropdown" style="float: right;">
        				<a id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" href="#">Logged in as <?php echo($_SESSION['nama']) ?><span class="caret"></span></a>
        				<ul class="dropdown-menu dropdown-menu-right">
            				<li><a href="#" data-toggle="modal" data-target="#edit">Edit password</a></li>
            				<li><a href="logout.php">Log out</a></li>
        				</ul>
    					</li>
    				</ul>
			</ul>
			</div>
			<div style="height: 4px;"></div>				
			<div class="iframe">
				<iframe name="frame" src="iframe/siswa/iframesiswa.php"></iframe>
			</div>
		</div>
		</div>
	</div>
	<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h2 class="modal-title" id="myModalLabel" style="text-align: center;">Edit Password <b><?php echo ($_SESSION['nama']); ?></b></h2>
	      </div>
	      <div class="modal-body">
	      	<form action="iframe/siswa/editpassword.php" method="post" style="display: block;" role="form">    			
    			<div class="form-group">
    				<label for="NIP">Password Baru</label>
    				<input type="password" class="form-control" placeholder="Password" name="password">
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
	  </div>
	</div>
<style type="text/css">	

	.info{
		margin-left: 5px;
		margin-right: 5px;
	}

	.info table td{
		padding-left: 5px;
		padding-right: 5px;
		padding-top: 1px;
		padding-bottom: 1px;
		
		letter-spacing: 2px;
	}
	
	.info table{
		margin-left: 10px;
	}

</style>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".nav a").on("click", function(){			
			$(".nav").find(".active").removeClass("active");			
			$(this).parent().addClass("active");			


		});
	});
</script>
</body>
</html>
<?php  
	}
	}
?>