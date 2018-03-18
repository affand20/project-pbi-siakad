<?php 
	session_start();
	include '../../konek.php';
if ($_POST['nama']==null && $_POST['jk']==null && $_POST['alamat']==null) {
	echo "<script>alert('Format pengisian salah! Silakan cek kembali format anda'); window.location = './edituser.php';</script>";
}
else{
	$cek_data = "SELECT * FROM siswa WHERE NIS = '".$_POST['nis']."'";
	$hasil = mysqli_query($conn, $cek_data);
	if (mysqli_num_rows($hasil)<=0) {
			echo "<script>alert('Data tidak terdaftar'); window.location = './edituser.php';</script>";
		}	
		else{			
			if ($_POST['nama']==null) {
				if ($_POST['jk']==null) {
					$update = "UPDATE siswa SET NIP = '".$_POST['nip']."', ALAMAT_SISWA = '".$_POST['alamat']."' WHERE NIS = '".$_POST['nis']."'";
					mysqli_query($conn, $update);
					mysqli_close($conn);
					echo "<script>alert('Edit info user berhasil'); window.location = './edituser.php';</script>";
				}
				else if ($_POST['alamat']==null) {
					$update = "UPDATE siswa SET NIP = '".$_POST['nip']."', JK_SISWA = '".$_POST['jk']."' WHERE NIS = '".$_POST['nis']."'";
					mysqli_query($conn, $update);
					mysqli_close($conn);
					echo "<script>alert('Edit info user berhasil'); window.location = './edituser.php';</script>";
				}
				else{
					$update = "UPDATE siswa SET NIP = '".$_POST['nip']."', JK_SISWA = '".$_POST['jk']."', ALAMAT_SISWA = '".$_POST['alamat']."' WHERE NIS = '".$_POST['nis']."'";
					mysqli_query($conn, $update);
					mysqli_close($conn);
					echo "<script>alert('Edit info user berhasil'); window.location = './edituser.php';</script>";
				}
			}
			if ($_POST['jk']==null) {
				if ($_POST['alamat']==null) {
					$update = "UPDATE siswa SET NIP = '".$_POST['nip']."', NAMA_SISWA = '".$_POST['nama']."' WHERE NIS = '".$_POST['nis']."'";
					mysqli_query($conn, $update);
					mysqli_close($conn);
					echo "<script>alert('Edit info user berhasil'); window.location = './edituser.php';</script>";
				}
				else{
					$update = "UPDATE siswa SET NIP = '".$_POST['nip']."', NAMA_SISWA = '".$_POST['nama']."', ALAMAT_SISWA = '".$_POST['alamat']."' WHERE NIS = '".$_POST['nis']."'";
					mysqli_query($conn, $update);
					mysqli_close($conn);
					echo "<script>alert('Edit info user berhasil'); window.location = './edituser.php';</script>";
				}
			}
			else{
			$update = "UPDATE siswa SET NIP = '".$_POST['nip']."', NAMA_SISWA = '".$_POST['nama']."', JK_SISWA = '".$_POST['jk']."', ALAMAT_SISWA = '".$_POST['alamat']."' WHERE NIS = '".$_POST['nis']."'";
			mysqli_query($conn, $update);
			mysqli_close($conn);
			echo "<script>alert('Edit info user berhasil'); window.location = './edituser.php';</script>";
			}
		}
}
?>