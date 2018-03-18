<?php  
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="overflow: hidden;">
	<div class="jumbotron">
      <div class="container">
      	<br><br><br>
        <h1>Hai, <?php echo($_SESSION['nama_tu']) ?></h1>
        <br>
        <p>Anda dapat mulai menambahkan guru atau siswa dengan klik tombol Tambahkan akun</p>        
      </div>
  </div>
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
<script src="../../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.js"></script>
</body>
</html>