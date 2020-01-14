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
      <form = name="form_search_destinasi" action="#" method="post">
        <input type="text" placeholder="Search.." name="nama_destinasi">
        <button type="submit" name="searching" value="cari"><i class="fa fa-search"></i></button>
      </form>
    </div>

    <div class="btn-toolbar text-center">
      <div class="add">
        <a href="form_input_data_destination.html" role="button" class="btn btn-success">Add Destinations</a>
    </div>
    </div>

    <div class="container thumbs">
  <?php
    include "../koneksi.php";

    if (isset($_POST['searching']) && !empty($_POST['searching'])) {
      $nama = $_POST['nama_destinasi'];
      $query = mysqli_query($kon, "SELECT * FROM destinasi WHERE nama_destinasi LIKE '%$nama%' ORDER BY id_destinasi");
      $hasil = mysqli_fetch_assoc($query);
      echo "<h1>".$hasil['lokasi_destinasi']."</h1>";
      while ($row = mysqli_fetch_assoc($query)) {
        echo "
            <div class='col-sm-6 col-md-4'>
              <div class='thumbnail'>
                <img src='../pict/".$row['image_destinasi']."' alt='' class='img-responsive'>
                <div class='caption'>
                  <h3 class=''>".$row['nama_destinasi']."</h3>
                  <p>".$row['description']."</p>
                  <div class='btn-toolbar text-center'>
                    <a href='detail_destinasi.php?id_destinasi=".$row['id_destinasi']."' role='button' class='btn btn-primary pull-right'>Details</a>
                  </div>
                </div>
              </div>
            </div>
            ";
      }
    } else {
      $lokasi = $_GET['lokasi_destinasi'];
      echo "<h1>".$lokasi."</h1>";
      $query = mysqli_query($kon, "SELECT * FROM destinasi WHERE lokasi_destinasi='$lokasi' ORDER BY id_destinasi");
      while ($row = mysqli_fetch_assoc($query)) {
        echo "
            <div class='col-sm-6 col-md-4'>
              <div class='thumbnail'>
                <img src='../pict/".$row['image_destinasi']."' alt='' class='img-responsive'>
                <div class='caption'>
                  <h3 class=''>".$row['nama_destinasi']."</h3>
                  <p>".$row['description']."</p>
                  <div class='btn-toolbar text-center'>
                    <a href='detail_destinasi.php?id_destinasi=".$row['id_destinasi']."' role='button' class='btn btn-primary pull-right'>Details</a>
                  </div>
                </div>
              </div>
            </div>
            ";
      }
    }
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
