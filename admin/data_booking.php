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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   <?php 
      include "navbar.html"; 
   ?>
    <!-- Slide gallery -->
    <div class="jumbotron">
    <!-- End Slide gallery -->
    </div>

    <!-- Thumbnails -->
    <div class="search">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </div>

    <div class="btn-toolbar text-center">

    </div>

    <div class="container thumbs">
    <h1 align="center">Daftar Data Booking</h1>
    <?php
      include "../koneksi.php";
      $select = "SELECT b.kode_booking, b.tanggal_tour,
                  pt.nama_paket, pt.description,
                  u.name
                  FROM booking AS b
                  JOIN paket_tour AS pt ON b.id_paket_tour = pt.id_paket_tour
                  JOIN user AS u ON b.username = u.username";

      $query = mysqli_query($kon, $select);
      echo "
            <table border='1' align='center' cellpadding='5' cellspacing='10'>
                <th>Kode Booking</th>
                <th>Tanggal</th>
                <th>Orang Yang Booking</th>
                <th>Nama Paket</th>
                <th>Description Paket</th>
          ";
      while ($row = mysqli_fetch_assoc($query)) {
        echo "
              <tr>
                <td align='center'>".$row['kode_booking']."</td>
                <td align='center'>".$row['tanggal_tour']."</td>
                <td align='center'>".$row['name']."</td>
                <td align='center'>".$row['nama_paket']."</td>
                <td align='center'>".$row['description']."</td>
              </tr>
            ";
      }
      echo "</table>";
  ?>

</div>
    <!-- Footer -->
    <?php
      include "../footer.html";
    ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootshape.js"></script>

  </body>
</html>