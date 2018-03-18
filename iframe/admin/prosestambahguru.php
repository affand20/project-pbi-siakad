<?php  
	session_start();
	include '../../konek.php';
if ($_POST['nama_wali']!=null && $_POST['nip']!=null && $_POST['jk']!=null && $_POST['alamat']!=null) {
	
	$nama_wali = $_POST['nama_wali'];
	$nip = $_POST['nip'];
	$jk = $_POST['jk'];
	$alamat = $_POST['alamat'];
	$cek_data = "SELECT NIP FROM wali_kelas WHERE NIP = '$nip'";
	$result = mysqli_query($conn, $cek_data);
	if (mysqli_num_rows($result)>0) {						
		echo "<script>alert('Daftar gagal, NIP sudah terpakai'); window.location = './tambah.php';</script>";		
	} else{
	$insert_data = "INSERT INTO wali_kelas (NIP,NIK,NAMA_WALI,JK_WALI,ALAMAT_WALI)
					VALUES('$nip','".$_SESSION['nik']."','$nama_wali','$jk','$alamat')";

					mysqli_query($conn, $insert_data);
					mysqli_close();
		echo "<script>alert('Daftar berhasil'); window.location = './tambah.php';</script>";
	}
}
else echo "<script>alert('Format pengisian salah! Silakan cek kembali format pengisian anda!'); window.location = './tambah.php';</script>";
?>