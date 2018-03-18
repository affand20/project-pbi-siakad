<?php 
	include 'konek.php';	

	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$jk = $_POST['jk'];	
	$alamat = $_POST['alamat'];
	$password = $_POST['password'];	
	$cek_data = "SELECT NIK FROM TU WHERE NIK = '$nik'";
	$result = mysqli_query($conn, $cek_data);
	if (mysqli_num_rows($result)>0) {						
		echo "<script>alert('Daftar gagal, NIK sudah terpakai'); window.location = './landingpage.html';</script>";		
	}
	else{
		$insert = "INSERT INTO TU (NIK,NAMA_TU,JK_TU,ALAMAT_TU,PASSWORD_TU)
					VALUES('$nik','$nama','$jk','$alamat','$password')";					

					mysqli_query($conn,$insert);
					mysqli_close($conn);					
				
		echo "<script>alert('Daftar berhasil'); window.location = './landingpage.html';</script>";
		}		
?>