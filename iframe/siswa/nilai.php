<?php  
	session_start();
	include '../../konek.php';

	$ambil_nilai = "SELECT * FROM NILAI WHERE NIS = '".$_SESSION['nis']."'";
	$query = mysqli_query($conn,$ambil_nilai);

	$row = mysqli_fetch_assoc($query);	

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="overflow: hidden;">

	<div class="panel panel-primary">  		
  		<div class="panel-heading" style="text-align: center; font-size: 20px;">Nilai <?php echo ($_SESSION['nama']);?></div>
  		<div class="panel-body">
    		<p>Catatan guru wali</p>
  		</div>
  		<table class="table">
    		<tr>
    			<th>Nilai Tugas</th>
    			<th><?php echo($row['NILAI_TUGAS']) ?></th>
    		</tr>
    		<tr>
    			<th>Nilai Ulangan</th>
    			<th><?php echo($row['NILAI_ULANGAN']) ?></th>
    		</tr>
    		<tr>
    			<th>Nilai UTS</th>
    			<th><?php echo($row['NILAI_UTS']) ?></th>
    		</tr>
    		<tr>
    			<th>Nilai UAS</th>
    			<th><?php echo($row['NILAI_UAS']) ?></th>
    		</tr>
  		</table>
	</div>

<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
<script src="../../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.js"></script>
</body>
</html>