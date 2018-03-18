<?php  
	session_start();
	include 'konek.php';
	$_SESSION['nik'] = $_POST['nik'];
	$_SESSION['password'] = $_POST['password'];	
	if ($_SESSION['nik']==null) {
		header("location:landingpage.html");
		session_destroy();
	}

	$cek_data = "SELECT * FROM TU WHERE NIK = '".$_SESSION['nik']."' AND PASSWORD_TU = '".$_SESSION['password']."'";
	$query = mysqli_query($conn, $cek_data);
	
	if (mysqli_num_rows($query)<=0) {
			echo "<script>alert('Gagal masuk, data tidak ditemukan. Silakan daftar dulu'); window.location = './landingpage.html';</script>";
			session_destroy();
	} else{
		$row = mysqli_fetch_assoc($query);		
		$_SESSION['nama_tu'] = $row['NAMA_TU'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Selamat Datang TU</title>
</head>
<body>
	<div class="all">				
		<div class="left">			
			<div class="foto">
				<p class="img"><img src="img/admin.png" class="admin"></p>
			</div>
			<br><br>
			<div class="info">
				<table>
					<tr>
						<td>Nama</td>
						<td><?php echo($row["NAMA_TU"]) ?></td>
					</tr>
					<tr>
						<td>NIK</td>
						<td><?php echo($_SESSION['nik']) ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td><?php echo($row["JK_TU"]) ?></td>
					</tr>					
					<tr>
						<td>Alamat</td>
						<td><?php echo($row["ALAMAT_TU"]) ?></td>
					</tr> 					
				</table>
			</div>
		</div>
		<div class="center">
			<div class="nvbr">
			<ul class="nav nav-pills">
 	 				<li role="presentation" class="active"><a href="iframe/admin/iframetu.php" target="frame">Home</a></li>
  					<li role="presentation"><a href="iframe/admin/tambah.php" target="frame">Tambah akun</a></li>
  					<li role="presentation"><a href="iframe/admin/edituser.php" target="frame">Edit info akun</a></li>
  					<li role="presentation"><a href="iframe/admin/lihatdaftaruser.php" target="frame">Lihat daftar akun</a></li>
					<ul id="myTab" class="nav nav-pills">
    					<li class="dropdown" style="float: right;">
        				<a id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" href="#">Logged in as <?php echo($row['NAMA_TU']) ?><span class="caret"></span></a>
        				<ul class="dropdown-menu dropdown-menu-right">        					
        					<li><a href="#" data-toggle="modal" data-target="#edit" >Edit profil saya</a></li>
            				<li><a href="logout.php">Log out</a></li>
        				</ul>
    					</li>
    				</ul>
			</ul>
			</div>			
			<div style="height: 4px;"></div>				
			<div class="iframe">
				<iframe name="frame" src="iframe/admin/iframetu.php"></iframe>
			</div>
		</div>
	</div>

	<div class="modal fade modal-primary" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h2 class="modal-title" id="myModalLabel" style="text-align: center;">Edit Profile <b><?php echo ($_SESSION['nama_tu']); ?></b></h2>
	      </div>
	      <div class="modal-body">
	      	<form id="guru" action="iframe/admin/editprofileadmin.php" method="post" style="display: block;" role="form">
    			<div class="form-group">
    				<label for="Nama guru">Nama Lengkap</label>
    				<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
    			</div>
    			<div class="form-group">
    				<label for="NIP">Password Baru</label>
    				<input type="password" class="form-control" placeholder="Password" name="password">
    			</div>
    			<div class="form-group">
    			<label for="Jenis Kelamin">Jenis Kelamin</label>
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
					<label for="Alamat">Alamat</label>
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