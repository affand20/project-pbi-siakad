<?php  
	include '../../konek.php';

if ($_POST['nilai_uts']>=0 && $_POST['nilai_uts']<=100 && $_POST['nilai_uas']>=0 && $_POST['nilai_uas']<=100 && $_POST['nilai_tugas']>=0 && $_POST['nilai_tugas']<=100 && $_POST['nilai_ulangan']>=0 && $_POST['nilai_ulangan']<=100) {	

	$cek_data = "SELECT * FROM nilai WHERE NIS = '".$_POST['nis-edit']."'";
	$hasil = mysqli_query($conn, $cek_data);
	if (mysqli_num_rows($hasil)<=0) {
		echo "<script>alert('Data tidak ada, silahkan input nilai untuk menambahkan nilai'); window.location = './inputnilai.php';</script>";
	}
	else{
		if ($_POST['nilai_uts']==null) {
			if ($_POST['nilai_uas']==null) {
				if ($_POST['nilai_tugas']==null) {
						$update = "UPDATE nilai SET NILAI_ULANGAN = '".$_POST['nilai_ulangan']."' WHERE NIS = '".$_POST['nis-edit']."'";

						mysqli_query($conn, $update);
						mysqli_close($conn);

						echo "<script>alert('Edit nilai berhasil'); window.location = './inputnilai.php';</script>";
				}
				else if ($_POST['nilai_ulangan']==null) {
					$update = "UPDATE nilai SET NILAI_TUGAS = '".$_POST['nilai_tugas']."' WHERE NIS = '".$_POST['nis-edit']."'";

					mysqli_query($conn, $update);
					mysqli_close($conn);

					echo "<script>alert('Edit nilai berhasil'); window.location = './inputnilai.php';</script>";
				} else{				
				$update = "UPDATE nilai SET NILAI_TUGAS = '".$_POST['nilai_tugas']."', NILAI_ULANGAN = '".$_POST['nilai_ulangan']."' WHERE NIS = '".$_POST['nis-edit']."'";

				mysqli_query($conn, $update);
				mysqli_close($conn);

				echo "<script>alert('Edit nilai berhasil'); window.location = './inputnilai.php';</script>";
				}
			}
			else if ($_POST['nilai_tugas']==null) {
				if ($_POST['nilai_ulangan']==null) {
					$update = "UPDATE nilai SET NILAI_UAS = '".$_POST['nilai_uas']."' WHERE NIS = '".$_POST['nis-edit']."'";

					mysqli_query($conn, $update);
					mysqli_close($conn);

					echo "<script>alert('Edit nilai berhasil'); window.location = './inputnilai.php';</script>";
				} else{
				$update = "UPDATE nilai SET NILAI_UAS = '".$_POST['nilai_uas']."', NILAI_ULANGAN = '".$_POST['nilai_ulangan']."' WHERE NIS = '".$_POST['nis-edit']."'";

				mysqli_query($conn, $update);
				mysqli_close($conn);

				echo "<script>alert('Edit nilai berhasil'); window.location = './inputnilai.php';</script>";
				}
			}
			else if ($_POST['ulangan']==null) {
				$update = "UPDATE nilai SET NILAI_UAS = '".$_POST['nilai_uas']."', NILAI_TUGAS = '".$_POST['nilai_tugas']."' WHERE NIS = '".$_POST['nis-edit']."'";

				mysqli_query($conn, $update);
				mysqli_close($conn);

				echo "<script>alert('Edit nilai berhasil'); window.location = './inputnilai.php';</script>";
			}
			else{
			$update = "UPDATE nilai SET NILAI_UAS = '".$_POST['nilai_uas']."', NILAI_TUGAS = '".$_POST['nilai_tugas']."', NILAI_ULANGAN = '".$_POST['nilai_ulangan']."' WHERE NIS = '".$_POST['nis-edit']."'";

			mysqli_query($conn, $update);
			mysqli_close($conn);

			echo "<script>alert('Edit nilai berhasil'); window.location = './inputnilai.php';</script>";
			}
		}

		if ($_POST['nilai_uas']==null) {
			if ($_POST['nilai_tugas']==null) {
				if ($_POST['nilai_ulangan']==null) {
					$update = "UPDATE nilai SET NILAI_UTS = '".$_POST['nilai_uts']."' WHERE NIS = '".$_POST['nis-edit']."'";

					mysqli_query($conn, $update);
					mysqli_close($conn);

					echo "<script>alert('Edit nilai berhasil'); window.location = './inputnilai.php';</script>";
				} else{
				$update = "UPDATE nilai SET NILAI_UTS = '".$_POST['nilai_uts']."', NILAI_ULANGAN = '".$_POST['nilai_ulangan']."' WHERE NIS = '".$_POST['nis-edit']."'";

				mysqli_query($conn, $update);
				mysqli_close($conn);

				echo "<script>alert('Edit nilai berhasil'); window.location = './inputnilai.php';</script>";
				}
			}
			else{
			$update = "UPDATE nilai SET NILAI_UTS = '".$_POST['nilai_uts']."', NILAI_TUGAS = '".$_POST['nilai_tugas']."', NILAI_ULANGAN = '".$_POST['nilai_ulangan']."' WHERE NIS = '".$_POST['nis-edit']."'";

			mysqli_query($conn, $update);
			mysqli_close($conn);

			echo "<script>alert('Edit nilai berhasil'); window.location = './inputnilai.php';</script>";
			}
		}

		if ($_POST['nilai_tugas']==null) {
			if ($_POST['nilai_ulangan']==null) {
				$update = "UPDATE nilai SET NILAI_UTS = '".$_POST['nilai_uts']."', NILAI_UAS = '".$_POST['nilai_uas']."' WHERE NIS = '".$_POST['nis-edit']."'";

				mysqli_query($conn, $update);
				mysqli_close($conn);

				echo "<script>alert('Edit nilai berhasil'); window.location = './inputnilai.php';</script>";
			} else{
			$update = "UPDATE nilai SET NILAI_UTS = '".$_POST['nilai_uts']."', NILAI_UAS = '".$_POST['nilai_uas']."', NILAI_ULANGAN = '".$_POST['nilai_ulangan']."' WHERE NIS = '".$_POST['nis-edit']."'";

			mysqli_query($conn, $update);
			mysqli_close($conn);

			echo "<script>alert('Edit nilai berhasil'); window.location = './inputnilai.php';</script>";
			}
		}

		if ($_POST['nilai_ulangan']==null) {
			$update = "UPDATE nilai SET NILAI_UTS = '".$_POST['nilai_uts']."', NILAI_UAS = '".$_POST['nilai_uas']."', NILAI_TUGAS = '".$_POST['nilai_tugas']."' WHERE NIS = '".$_POST['nis-edit']."'";

			mysqli_query($conn, $update);
			mysqli_close($conn);

			echo "<script>alert('Edit nilai berhasil'); window.location = './inputnilai.php';</script>";
		}							

		else{
			$update = "UPDATE nilai SET NILAI_UTS = '".$_POST['nilai_uts']."', NILAI_UAS = '".$_POST['nilai_uas']."', NILAI_TUGAS = '".$_POST['nilai_tugas']."', NILAI_ULANGAN = '".$_POST['nilai_ulangan']."' WHERE NIS = '".$_POST['nis-edit']."'";

			mysqli_query($conn, $update);
			mysqli_close($conn);

			echo "<script>alert('Edit nilai berhasil'); window.location = './inputnilai.php';</script>";
		}
	}
}
else{echo "<script>alert('Format pengisian salah! Cek kembali format anda!'); window.location = './inputnilai.php';</script>";}

?>