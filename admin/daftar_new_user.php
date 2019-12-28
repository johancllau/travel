<?php
   include "../koneksi.php";
   if (isset($_POST['daftar']) and !empty($_POST['daftar'])) {

   	$nama     = $_POST['nama'];
      $email    = $_POST['email'];
   	$username = $_POST['username'];
   	$pass     = $_POST['password'];
   	$gender   = $_POST['gender'];
   	$notelp   = $_POST['notelp'];
      $alamat   = $_POST['alamat'];
      $status   = $_POST['status'];

   	$falidate_date = true;
      if (isset($nama) and !empty($nama)) {
         if (strlen(trim($nama)) == 0) {
            $falidate_date = false;
            echo "<body bgcolor='#37988e'>";
            echo "<H3 align='center'>Nama Tidak Boleh kosong<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
                  </table></body>";
         }
      }
   	if (isset($email) and !empty($email)) {
   		if (strlen(trim($email)) == 0) {
   			$falidate_date = false;
   			echo "<body bgcolor='#37988e'>";
            echo "<H3 align='center'>E-mail Tidak Boleh kosong<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
                  </table></body>";
   		}
   	}
   	if (isset($username) and !empty($username)) {
   		if (strlen(trim($username)) == 0) {
   			$falidate_date = false;
   			echo "<body bgcolor='#37988e'>";
            echo "<H3 align='center'>Username Tidak Boleh kosong<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
                  </table></body>";
   		}
   	}
   	if (isset($pass) and !empty($pass)) {
   		if (strlen(trim($pass)) == 0) {
   			$falidate_date = false;
   			echo "<body bgcolor='#37988e'>";
            echo "<H3 align='center'>Password Tidak Boleh kosong<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
                  </table></body>";
   		}
   	}
   	if (isset($gender) and !empty($gender)) {
   		if (strlen(trim($gender)) == 0) {
   			$falidate_date = false;
   			echo "<body bgcolor='#37988e'>";
            echo "<H3 align='center'>Gender Harus Di Pilih<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
                  </table></body>";
   		}
   	}
      if (isset($alamat) and !empty($alamat)) {
         if (strlen(trim($alamat)) == 0) {
            $falidate_date = false;
            echo "<body bgcolor='#37988e'>";
            echo "<H3 align='center'>Alamat Tidak Boleh kosong<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
                  </table></body>";
         }
      }
   	if (isset($notelp) and !empty($notelp)) {
   		if (strlen(trim($notelp)) == 0) {
   			$falidate_date = false;
   			echo "<body bgcolor='#37988e'>";
            echo "<H3 align='center'>No.Telp Tidak Boleh kosong<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
                  </table></body>";
   		}
   	}
      if (isset($status) and !empty($status)) {
         if (is_null(trim($status))) {
            $falidate_date = false;
            echo "<body bgcolor='#37988e'>";
            echo "<H3 align='center'>Status Harus di Pilih<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
                  </table></body>";
         }
      }

   	$sql = "INSERT INTO user VALUES ('$username', '$pass', '$nama', '$email', '$gender', '$notelp', '$alamat', '$status');";
   	$hasil = mysqli_query($kon, $sql);
   	if (!$hasil) {
   		die("Gagal Input Data");
   	}
   	else {
         echo "<body bgcolor='#37988e'>";
   		echo "<H2 align='center'>Pendaftaran Berhasil</H2>";
   		echo "<table align='center'> 
   				<tr><td><a href='../form_login.html'>click disini untuk login!!</td></tr></table></body>";
   	}
   }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <title>Akakom Travel</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    
    <!--Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Belgrano|Courgette&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

    
    <!--Bootshape-->
    <link href="../css/bootshape.css" rel="stylesheet">
 </head>
 <body>
 
 </body>
 </html>