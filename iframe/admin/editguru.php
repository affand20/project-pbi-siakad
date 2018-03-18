<?php 
	session_start();
	include '../../konek.php';
if ($_POST['nama']==null && $_POST['jk']==null && $_POST['alamat']==null) {
	echo "<script>alert('Format pengisian salah! Silakan cek kembali format anda'); window.location = './edituser.php';</script>";
}
else{

	$cek_data = "SELECT * FROM wali_kelas WHERE NIP = '".$_POST['nip']."'";
	$hasil = mysqli_query($conn, $cek_data);
	if (mysqli_num_rows($hasil)<=0) {
			echo "<script>alert('Data tidak terdaftar'); window.location = './edituser.php';</script>";
		}	
		else{			
			if ($_POST['nama']==null) {
				if ($_POST['jk']==null) {
					$update = "UPDATE wali_kelas SET ALAMAT_WALI = '".$_POST['alamat']."' WHERE NIP = '".$_POST['nip']."'";
					mysqli_query($conn, $update);
					mysqli_close($conn);
					echo "<script>alert('Edit info user berhasil'); window.location = './edituser.php';</script>";
				}
				else if ($_POST['alamat']==null) {
					$update = "UPDATE wali_kelas SET JK_WALI = '".$_POST['jk']."' WHERE NIP = '".$_POST['nip']."'";
					mysqli_query($conn, $update);
					mysqli_close($conn);
					echo "<script>alert('Edit info user berhasil'); window.location = './edituser.php';</script>";
				}
				else{
					$update = "UPDATE wali_kelas SET JK_WALI = '".$_POST['jk']."', ALAMAT_WALI = '".$_POST['alamat']."' WHERE NIP = '".$_POST['nip']."'";
					mysqli_query($conn, $update);
					mysqli_close($conn);
					echo "<script>alert('Edit info user berhasil'); window.location = './edituser.php';</script>";
				}
			}
			if ($_POST['jk']==null) {
				if ($_POST['alamat']==null) {
					$update = "UPDATE wali_kelas SET NAMA_WALI = '".$_POST['nama']."' WHERE NIP = '".$_POST['nip']."'";
					mysqli_query($conn, $update);
					mysqli_close($conn);
					echo "<script>alert('Edit info user berhasil'); window.location = './edituser.php';</script>";
				}
				else{
					$update = "UPDATE wali_kelas SET NAMA_WALI = '".$_POST['nama']."', ALAMAT_WALI = '".$_POST['alamat']."' WHERE NIP = '".$_POST['nip']."'";
					mysqli_query($conn, $update);
					mysqli_close($conn);
					echo "<script>alert('Edit info user berhasil'); window.location = './edituser.php';</script>";
				}
			}
			else{
			$update = "UPDATE wali_kelas SET NAMA_WALI = '".$_POST['nama']."', JK_WALI = '".$_POST['jk']."', ALAMAT_WALI = '".$_POST['alamat']."' WHERE NIP = '".$_POST['nip']."'";
			mysqli_query($conn, $update);
			mysqli_close($conn);
			echo "<script>alert('Edit info user berhasil'); window.location = './edituser.php';</script>";
			}
		}
}
?>