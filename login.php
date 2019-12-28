<?php
include "koneksi.php";
	$username = $_POST['username'];
	$pass = $_POST['password'];

	$validate_data = true;

	if (strlen(trim($username))==0) {
		echo "<body bgcolor='#37988e'>";
		echo "<H3 align='center'>Username Tidak Boleh kosong<H3>";
		echo "<table border='0' align='center'>
			<tr>
				<td><input type='button' value='kembali' onClick='self.history.back()'></td>
			</tr>
		</table></body>";
		$validate_data=false;
		die();
	}
	if (strlen(trim($pass)) == 0) {
		echo "<body bgcolor='#37988e'>";
		echo "<H3 align='center'>Password Tidak Boleh Kosong</H3>";
		echo "<table border='0' align='center'>
			<tr>
				<td><input type='button' value='kembali' onClick='self.history.back()'></td>
			</tr>
		</table></body>";
		$validate_data=false;
	}

	if ($validate_data) {
		$sql = "SELECT * FROM user WHERE username='$username' AND password='$pass'";
		$hasil = mysqli_query($kon, $sql);
		
		if (!$hasil) {
			echo "<body bgcolor='#37988e'><H3 align='center'>Username dan Password Tidak Sesuai</H3>";
			echo "<table border='0' align='center'>
			<tr>
				<td><input type='button' value='kembali' onClick='self.history.back()'></td>
			</tr>
		</table></body>";
		}
		else {
			$row = mysqli_fetch_assoc($hasil);
			if($row['status'] == 1){
				$_SESSION['admin']=$user;
				echo '<script language="javascript">alert("Anda berhasil Login Sebagai Admin!"); document.location="admin/homeadmin.php";</script>';
			}
			else{
				$_SESSION['guest']=$user;
				echo '<script language="javascript">alert("Anda berhasil Login Sebagai User!"); document.location="user/home.php";</script>';
			}
		}
	}
	mysqli_close($kon);
    ob_end_flush();
?>