<?php  
	session_start();
	include '../../konek.php';
	

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
        <h1>Hai, <?php echo($_SESSION['nama']) ?></h1>
        <br>
        <p>Baru selesai ujian ? Silakan masukkan nilai murid anda di Input Nilai Siswa</p>        
      </div>
  </div>
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
<script src="../../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.js"></script>
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