<?php  
	session_start();
	include '../../konek.php';
if ($_POST['nilai_uts']>=0 && $_POST['nilai_uts']<=100 && $_POST['nilai_uas']>=0 && $_POST['nilai_uas']<=100 && $_POST['nilai_tugas']>=0 && $_POST['nilai_tugas']<=100 && $_POST['nilai_ulangan']>=0 && $_POST['nilai_ulangan']<=100) {	

	$cek_data = "SELECT * FROM nilai WHERE NIS = '".$_POST['nis-add']."'";
	$query = mysqli_query($conn, $cek_data);
	if (mysqli_num_rows($query)>0) {
		echo "<script>alert('Data sudah ada, silahkan edit nilai untuk mengganti'); window.location = './inputnilai.php';</script>";
		
	}
	else{
	$insert = "INSERT INTO nilai (NIP,NIS,NILAI_UTS,NILAI_UAS,NILAI_TUGAS,NILAI_ULANGAN)
				VALUES('".$_SESSION['nip']."','".$_POST['nis-add']."','".$_POST['nilai_uts']."','".$_POST['nilai_uas']."','".$_POST['nilai_tugas']."','".$_POST['nilai_ulangan']."')";

				mysqli_query($conn, $insert);
				mysqli_close($conn);
				echo "<script>alert('Input nilai berhasil'); window.location = './inputnilai.php';</script>";
			}
}
else{echo "<script>alert('Format pengisian salah! Cek kembali format anda!'); window.location = './inputnilai.php';</script>";}
?>