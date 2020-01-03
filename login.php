 <!DOCTYPE html>
 <html>
 <head>
   <title>Akakom Travel</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    
    <!--Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Belgrano|Courgette&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

    
    <!--Bootshape-->
    <link href="css/bootshape.css" rel="stylesheet">
 </head>
 <body>
 
 </body>
 </html>
<?php
include "koneksi.php";
	$username = $_POST['username'];
	$pass = $_POST['password'];

	$validate_data = true;

	if (strlen(trim($username))==0) {
		echo "<H3 align='center'>Username Tidak Boleh kosong<H3>";
		echo "<table border='0' align='center'>
			<tr>
				<td><input type='button' value='kembali' onClick='self.history.back()'></td>
			</tr>
		</table></body>";
		$validate_data=false;
		return;
	}
	if (strlen(trim($pass)) == 0) {
		echo "<H3 align='center'>Password Tidak Boleh Kosong</H3>";
		echo "<table border='0' align='center'>
			<tr>
				<td><input type='button' value='kembali' onClick='self.history.back()'></td>
			</tr>
		</table></body>";
		$validate_data=false;
		return;
	}

	if ($validate_data) {
		$sql = "SELECT * FROM user WHERE username='$username' AND password='$pass'";
		$query = mysqli_query($kon, $sql);

		if(mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_assoc($query);
			if($row['status'] == 1){
				$_SESSION['admin']=$username;
				echo '<script language="javascript">alert("Anda berhasil Login Sebagai Admin!"); document.location="admin/home.php";</script>';
			}
			elseif ($row['status'] == 0 ) {
				$_SESSION['user']=$username;
				echo '<script language="javascript">alert("Anda berhasil Login Sebagai User!"); document.location="user/home.php";</script>';
			}
			else {
				echo "<H3 align='center'>Username dan Password Tidak Sesuai</H3>";
				echo "<table border='0' align='center'>
						<tr>
							<td><input type='button' value='kembali' onClick='self.history.back()'></td>
						</tr>
					  </table></body>";
			}
		}
		else {
			echo "<H3 align='center'>Username dan Password Tidak Sesuai</H3>";
			echo "<table border='0' align='center'>
					<tr>
						<td><input type='button' value='kembali' onClick='self.history.back()'></td>
					</tr>
				 </table></body>";
		}
	}
	
	mysqli_close($kon);
    ob_end_flush();
?>