<?php  
	session_start();
	include '../../konek.php';
if ($_POST['password']==null) {
	echo "<script>alert('Format pengisian salah! Silakan cek kembali format pengisian anda!')</script>";
}
	$update = "UPDATE wali_kelas SET PASSWORD_WALI = '".$_POST['password']."' WHERE NIP = '".$_SESSION['nip']."'";
	mysqli_query($conn, $update);
	mysqli_close($conn);

	echo "<script>alert('Edit password berhasil. Silakan login ulang untuk memperbarui.'); window.location = './../../landingpage.html';</script>";
?>