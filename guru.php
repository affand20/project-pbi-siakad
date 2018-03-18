<?php  
	session_start();
	include 'konek.php';
	$_SESSION['nip'] = $_POST['nip'];
	$_SESSION['password'] = $_POST['password'];

	if ($_SESSION['nip']==null) {
		header("location:landingpage.html");
		session_destroy();
	}

	$cek_data = "SELECT * FROM WALI_KELAS WHERE NIP = '".$_SESSION['nip']."' AND PASSWORD_WALI = '".$_SESSION['password']."'";
	$query = mysqli_query($conn, $cek_data);

	if (mysqli_num_rows($query)<=0) {
		echo "<script>alert('Gagal masuk, data tidak ditemukan. Silakan daftar dulu'); window.location = './landingpage.html';</script>";
		session_destroy();
	}
	else{
		$row = mysqli_fetch_assoc($query);
		$_SESSION['nama'] = $row['NAMA_WALI'];
		$_SESSION['jk'] = $row['JK_WALI'];
		$_SESSION['alamat'] = $row['ALAMAT_WALI'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Selamat Datang Guru</title>
</head>
<body>
	<div class="all">		
		<div class="left">			
			<div class="foto">
				<p class="img"><img src="img/dosen.png" class="guru"></p>
			</div>
			<br><br>
			<div class="info">
				<table>
					<tr>
						<td>Nama</td>
						<td><?php echo($_SESSION['nama']) ?></td>
					</tr>					
					<tr>
						<td>NIP</td>
						<td><?php echo($_SESSION['nip']) ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td><?php echo($_SESSION['jk']) ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td><?php echo($_SESSION['alamat']) ?></td>
					</tr> 					
				</table>
			</div>
		</div>
		<div class="center">
			<div class="nvbr">
			<ul class="nav nav-pills">
 	 				<li role="presentation" class="active"><a href="iframe/guru/iframeguru.php" target="frame">Home</a></li>
  					<li role="presentation"><a href="iframe/guru/inputnilai.php" target="frame">Input Nilai Siswa</a></li>
  					<li role="presentation"><a href="iframe/guru/daftarsiswa.php" target="frame">Lihat Daftar Siswa Anda</a></li>			
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
			<div class="iframe">
				<iframe name="frame" src="iframe/guru/iframeguru.php"></iframe>
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
	      	<form action="iframe/guru/editpassword.php" method="post" style="display: block;" role="form">    			
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
?>