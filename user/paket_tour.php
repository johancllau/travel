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
    <form name="form-Booking" action="#" method="post">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit" name="cari"><i class="fa fa-search"></i></button>
    </form>
    </div>

    <div class="btn-toolbar text-center">

    </div>

    <div class="container thumbs">
    <h1 align="center">Daftar Paket Tour</h1>
    <?php
    include "../koneksi.php";
    if(isset($_POST['cari'])){
      $cari = $_POST['search'];
      $select = "SELECT pt.id_paket_tour, pt.nama_paket, pt.daftar_destinasi, pt.harga_paket, pt.description,
      mt.kapasitas, mt.image_travell
      FROM paket_tour AS pt
      JOIN mobil_travel AS mt ON pt.kode_travell = mt.kode_travell  WHERE  pt.nama_paket LIKE '%".$cari."%'" ;
      $query = mysqli_query($kon, $select);
      echo "
              <table border='1' align='center' cellpadding='5' cellspacing='10'>
                <th>Nama Paket</th>
                <th>Destinasi</th>
                <th>Travell</th>
                <th>Kapasitas</th>
                <th>Harga</th>
                <th>Description</th>
                <th>Booking</th>
          ";

          $id = 0;
          $id_des = null;
          $nama_des = null;
          while ($row = mysqli_fetch_assoc($query)) {
              echo "
              <tr>
                <td align='center'>".$row['nama_paket']."</td>
                <td align='center'>".$row['daftar_destinasi']."</td>
                <td align='center'><img src='../pict/".$row['image_travell']."' width='150' height='150'></td>
                <td align='center'>".$row['kapasitas']." Penumpang</td>
                <td align='center'>Rp. ".$row['harga_paket']."</td>
                <td align='center'>".$row['description']."</td>
                <td align='center'><a href='form_booking.php?id_paket=".$row['id_paket_tour']."'>Booking</td>
              </tr>
            ";
            $id = $row['id_paket_tour'];
            }
      echo "</table>";
    }else{
      $select = "SELECT pt.id_paket_tour, pt.nama_paket, pt.daftar_destinasi, pt.harga_paket, 
                  pt.description, mt.kapasitas, mt.image_travell
      FROM paket_tour AS pt
      JOIN mobil_travel AS mt ON pt.kode_travell = mt.kode_travell";
      $query = mysqli_query($kon, $select);
      echo "
              <table border='1' align='center' cellpadding='5' cellspacing='10'>
                <th>Nama Paket</th>
                <th>Destinasi</th>
                <th>Travell</th>
                <th>Kapasitas</th>
                <th>H darga</th>
                <th>Description</th>
                <th>Aksi</th>
          ";
      $id = 0;
      $id_des = null;
      $nama_des = null;
      while ($row = mysqli_fetch_assoc($query)) {
          echo "
          <tr>
            <td align='center'>".$row['nama_paket']."</td>
            <td align='center'>".$row['daftar_destinasi']."</td>
            <td align='center'><img src='../pict/".$row['image_travell']."' width='150' height='150'></td>
            <td align='center'>".$row['kapasitas']." Penumpang</td>
            <td align='center'>Rp. ".$row['harga_paket']."</td>
            <td align='center'>".$row['description']."</td>
            <td align='center'><a href='form_booking.php?id_paket=".$row['id_paket_tour']."'>Booking</td>
          </tr>
        ";
            $id = $row['id_paket_tour'];
            }}
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