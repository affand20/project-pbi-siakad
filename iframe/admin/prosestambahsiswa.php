<?php  
	session_start();
	include '../../konek.php';
if ($_POST['nama_siswa']!=null && $_POST['nip']!=null && $_POST['jk']!=null && $_POST['alamat']!=null) {
	$nama_siswa = $_POST['nama_siswa'];
	$nis = $_POST['nis'];
	$jk = $_POST['jk'];
	$alamat = $_POST['alamat'];
	$wali_kelas = $_POST['wali_kelas'];
	$cek_data = "SELECT NIS FROM siswa WHERE NIS = '$nis'";
	$result = mysqli_query($conn, $cek_data);

	if (mysqli_num_rows($result)>0) {
		echo "<script>alert('Daftar gagal, NIS sudah terpakai'); window.location = './tambah.php';</script>";
	} else{
		$insert_data = "INSERT INTO siswa(NIS,NIP,NIK,NAMA_SISWA,JK_SISWA,ALAMAT_SISWA)
						VALUES('$nis','$wali_kelas','".$_SESSION['nik']."','$nama_siswa','$jk','$alamat')";
					mysqli_query($conn, $insert_data);
					mysqli_close();
		echo "<script>alert('Daftar berhasil'); window.location = './tambah.php';</script>";
	}	
}
else echo "<script>alert('Format pengisian salah! Silakan cek kembali format pengisian anda!'); window.location = './tambah.php';</script>";
?>