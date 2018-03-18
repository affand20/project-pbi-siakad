<?php  
	session_start();
	include '../../konek.php';
if ($_POST['nama']!=null && $_POST['jk']!=null && $_POST['alamat']!=null) {
	
	
		if ($_POST['nama']==null) {
			if ($_POST['jk']==null) {
				if ($_POST['alamat']==null) {
						$update = "UPDATE tu SET PASSWORD_TU = '".$_POST['password']."' WHERE NIK = '".$_SESSION['nik']."'";

						mysqli_query($conn, $update);
						mysqli_close($conn);

						echo "<script>alert('Edit info berhasil, silakan login kembali untuk memperbarui'); window.location = './../../landingpage.html';</script>";
				}
				else if ($_POST['password']==null) {
					$update = "UPDATE tu SET ALAMAT_TU = '".$_POST['alamat']."' WHERE NIK = '".$_SESSION['nik']."'";

					mysqli_query($conn, $update);
					mysqli_close($conn);

					echo "<script>alert('Edit info berhasil, silakan login kembali untuk memperbarui'); window.location = './../../landingpage.html';</script>";
				} else{				
				$update = "UPDATE tu SET ALAMAT_TU = '".$_POST['alamat']."', PASSWORD_TU = '".$_POST['password']."' WHERE NIK = '".$_SESSION['nik']."'";

				mysqli_query($conn, $update);
				mysqli_close($conn);

				echo "<script>alert('Edit info berhasil, silakan login kembali untuk memperbarui'); window.location = './../../landingpage.html';</script>";
				}
			}
			else if ($_POST['alamat']==null) {
				if ($_POST['password']==null) {
					$update = "UPDATE tu SET JK_TU = '".$_POST['jk']."' WHERE NIK = '".$_SESSION['nik']."'";

					mysqli_query($conn, $update);
					mysqli_close($conn);

					echo "<script>alert('Edit info berhasil, silakan login kembali untuk memperbarui'); window.location = './../../landingpage.html';</script>";
				} else{
				$update = "UPDATE tu SET JK_TU = '".$_POST['jk']."', PASSWORD_TU = '".$_POST['password']."' WHERE NIK = '".$_SESSION['nik']."'";

				mysqli_query($conn, $update);
				mysqli_close($conn);

				echo "<script>alert('Edit info berhasil, silakan login kembali untuk memperbarui'); window.location = './../../landingpage.html';</script>";
				}
			}
			else if ($_POST['password']==null) {
				$update = "UPDATE tu SET JK_TU = '".$_POST['jk']."', ALAMAT_TU = '".$_POST['alamat']."' WHERE NIK = '".$_SESSION['nik']."'";

				mysqli_query($conn, $update);
				mysqli_close($conn);

				echo "<script>alert('Edit info berhasil, silakan login kembali untuk memperbarui'); window.location = './../../landingpage.html';</script>";
			}
			else{
			$update = "UPDATE tu SET JK_TU = '".$_POST['jk']."', ALAMAT_TU = '".$_POST['alamat']."', PASSWORD_TU = '".$_POST['password']."' WHERE NIK = '".$_SESSION['nik']."'";

			mysqli_query($conn, $update);
			mysqli_close($conn);

			echo "<script>alert('Edit info silakan logout dan login kembali untuk memperbarui'); window.location = './../../landingpage.html';</script>";
			}
		}

		if ($_POST['jk']==null) {
			if ($_POST['alamat']==null) {
				if ($_POST['password']==null) {
					$update = "UPDATE tu SET NAMA_TU = '".$_POST['nama']."' WHERE NIK = '".$_SESSION['nik']."'";

					mysqli_query($conn, $update);
					mysqli_close($conn);

					echo "<script>alert('Edit info berhasil, silakan login kembali untuk memperbarui'); window.location = './../../landingpage.html';</script>";
				} else{
				$update = "UPDATE tu SET NAMA_TU = '".$_POST['nama']."', PASSWORD_TU = '".$_POST['password']."' WHERE NIK = '".$_SESSION['nik']."'";

				mysqli_query($conn, $update);
				mysqli_close($conn);

				echo "<script>alert('Edit info berhasil, silakan login kembali untuk memperbarui'); window.location = './../../landingpage.html';</script>";
				}
			}
			else{
			$update = "UPDATE tu SET NAMA_TU = '".$_POST['nama']."', ALAMAT_TU = '".$_POST['alamat']."', PASSWORD_TU = '".$_POST['password']."' WHERE NIK = '".$_SESSION['nik']."'";

			mysqli_query($conn, $update);
			mysqli_close($conn);

			echo "<script>alert('Edit info silakan logout dan login kembali untuk memperbarui'); window.location = './../../landingpage.html';</script>";
			}
		}

		if ($_POST['alamat']==null) {
			if ($_POST['password']==null) {
				$update = "UPDATE tu SET NAMA_TU = '".$_POST['nama']."', JK_TU = '".$_POST['jk']."' WHERE NIK = '".$_SESSION['nik']."'";

				mysqli_query($conn, $update);
				mysqli_close($conn);

				echo "<script>alert('Edit info berhasil, silakan login kembali untuk memperbarui'); window.location = './../../landingpage.html';</script>";
			} else{
			$update = "UPDATE tu SET NAMA_TU = '".$_POST['nama']."', JK_TU = '".$_POST['jk']."', PASSWORD_TU = '".$_POST['password']."' WHERE NIK = '".$_SESSION['nik']."'";

			mysqli_query($conn, $update);
			mysqli_close($conn);

			echo "<script>alert('Edit info silakan logout dan login kembali untuk memperbarui'); window.location = './../../landingpage.html';</script>";
			}
		}

		if ($_POST['password']==null) {
			$update = "UPDATE tu SET NAMA_TU = '".$_POST['nama']."', JK_TU = '".$_POST['jk']."', ALAMAT_TU = '".$_POST['alamat']."' WHERE NIK = '".$_SESSION['nik']."'";

			mysqli_query($conn, $update);
			mysqli_close($conn);

			echo "<script>alert('Edit info silakan logout dan login kembali untuk memperbarui'); window.location = './../../landingpage.html';</script>";
		}

		else{
			$update = "UPDATE tu SET NAMA_TU = '".$_POST['nama']."', JK_TU = '".$_POST['jk']."', ALAMAT_TU = '".$_POST['alamat']."', PASSWORD_TU = '".$_POST['password']."' WHERE NIK = '".$_SESSION['nik']."'";

			mysqli_query($conn, $update);
			mysqli_close($conn);

	echo "<script>alert('Edit info silakan logout dan login kembali untuk memperbarui'); window.location = './../../landingpage.html';</script>";
		}
}
else echo "<script>alert('Format pengisian salah! Silakan cek kembali format anda'); window.location = './../../admin.php';</script>";
	
?>