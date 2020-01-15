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
<?php
   include "../koneksi.php";
   
   if (isset($_POST['submit']) and !empty($_POST['submit'])) {

   	$nama     = $_POST['nama'];
    $daftar = $_POST['tempat'];
    $harga    = $_POST['harga'];
   	$desc      = $_POST['description'];
   	$travel     = $_POST['travel'];

   	$falidate_date = true;
      if (strlen(trim($nama)) == 0) {
         $falidate_date = false;
         echo "<H3 align='center'>Nama Tidak Boleh kosong<H3>";
         echo "<table border='0' align='center'>
                <tr>
                  <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                </tr>
               </table></body>";
               return;
      }
      if (strlen(trim($daftar)) == 0) {
         $falidate_date = false;;
         echo "<H3 align='center'>Tempat Destinasi Tidak Boleh kosong<H3>";
         echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
               </table></body>";
               return;
      }
      if (strlen(trim($harga)) == 0) {
         $falidate_date = false;;
         echo "<H3 align='center'>Harga Tidak Boleh kosong<H3>";
         echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
               </table></body>";
               return;
      }
      if (strlen(trim($desc)) == 0) {
         $falidate_date = false;
         echo "<H3 align='center'>Description Tidak Boleh kosong<H3>";
         echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
               </table></body>";
               return;
      }
      if (strlen(trim($travel)) == 0) {
         $falidate_date = false;
         echo "<H3 align='center'>Travel Harus di Pilih<H3>";
         echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
               </table></body>";
               return;
      }

      if ($falidate_date) {
         $sql = "INSERT INTO paket_tour (nama_paket, daftar_destinasi, harga_paket, description, kode_travell) VALUES ('$nama', '$daftar',$harga, '$desc', $travel);";
         $hasil = mysqli_query($kon, $sql);
         if (!$hasil) {
            echo "<H3 align='center'>Gagal Menyimpan Data!!<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
               </table></body>";
               return;
         }
         else {
             echo '<script language="javascript">alert("Berhasil Menambahkan Paket Tour!"); document.location="paket_tour.php";</script>';
         }  
      }
   }

   elseif (isset($_POST['edit']) and !empty($_POST['edit'])) {
   	 $id_paket  = $_POST['id_paket'];
       $nama      = $_POST['nama'];
       $harga     = $_POST['harga'];
   	 $desc      = $_POST['description'];
   	 $travel    = $_POST['travell'];

        	$falidate_date = true;
      if (strlen(trim($nama)) == 0) {
         $falidate_date = false;
         echo "<H3 align='center'>Nama Tidak Boleh kosong<H3>";
         echo "<table border='0' align='center'>
                <tr>
                  <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                </tr>
               </table></body>";
               return;
      }
      if (strlen(trim($harga)) == 0) {
         $falidate_date = false;;
         echo "<H3 align='center'>Harga Tidak Boleh kosong<H3>";
         echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
               </table></body>";
               return;
      }
      if (strlen(trim($desc)) == 0) {
         $falidate_date = false;
         echo "<H3 align='center'>Description Tidak Boleh kosong<H3>";
         echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
               </table></body>";
               return;
      }
      if (strlen(trim($travel)) == 0) {
         $falidate_date = false;
         echo "<H3 align='center'>Travel Harus di Pilih<H3>";
         echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
               </table></body>";
               return;
      }
      
      if ($falidate_date) {
         $sql = "UPDATE paket_tour SET nama_paket='$nama', harga_paket=$harga, description='$desc', kode_travell=$travel WHERE id_paket_tour=$id_paket";
         $hasil = mysqli_query($kon, $sql);
         if (!$hasil) {
            echo "<H3 align='center'>Gagal Mengubah Data!!<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
               </table></body>";
               return;
         }
         else {
            echo '<script language="javascript">alert("Data Berhasil di Ubah!"); document.location="paket_tour.php";</script>';
         }
      }
   }
 ?>