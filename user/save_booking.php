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
   	    $tgl      = $_POST['tanggal_tour'];
        $id_paket = $_POST['id_paket_tour'];
        $username = $_SESSION['user'];
        
       	$falidate_date = true;
        if (strlen(trim($tgl)) == 0) {
            $falidate_date = false;
            echo "<H3 align='center'>Tanggal Tour Tidak Boleh kosong<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                      <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
                  </table></body>";
              return;
        }

        if ($falidate_date) {
            $sql = "INSERT INTO booking (tanggal_tour, username, id_paket_tour) VALUES ('$tgl', '$username', $id_paket);";
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
                echo '<script language="javascript">alert("Berhasil Melakukan Booking Paket Tour! \n Anda membooking paket tour untuk tanggal '.$tgl.'!!"); document.location="paket_tour.php";</script>';
            }  
        }
    }
 ?>