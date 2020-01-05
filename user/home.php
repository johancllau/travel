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
      <div class="container">
        <div class="col-xs-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-sl ide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
            
          </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner">

          <?php
          include "../koneksi.php";
          $query = mysqli_query($kon, "SELECT * FROM destinasi WHERE lokasi_destinasi = 'Yogyakarta' ORDER BY RAND() LIMIT 1");
          while ($row = mysqli_fetch_assoc($query)) {
          echo"<div class='item active'>
          <img src='../pict/".$row['image_destinasi']."' alt=''>
          <div class='carousel-caption'>
          </div>
          </div>";  
          }
          ?>
          
          <?php
          $query = mysqli_query($kon, "SELECT * FROM destinasi WHERE lokasi_destinasi = 'Gunung Kidul' ORDER BY RAND() LIMIT 1");
          while ($row = mysqli_fetch_assoc($query)) {
          echo"<div class='item'>
          <img src='../pict/".$row['image_destinasi']."' alt=''>
          <div class='carousel-caption'>
          </div>
          </div>";  
          }
          ?>

          <?php
          $query = mysqli_query($kon, "SELECT * FROM destinasi WHERE lokasi_destinasi = 'Kulon Progo' ORDER BY RAND() LIMIT 1");
          while ($row = mysqli_fetch_assoc($query)) {
          echo"<div class='item'>
          <img src='../pict/".$row['image_destinasi']."' alt=''>
          <div class='carousel-caption'>
          </div>
          </div>";  
          }
          ?>
          
          <?php
          $query = mysqli_query($kon, "SELECT * FROM destinasi WHERE lokasi_destinasi = 'Bantul' ORDER BY RAND() LIMIT 1");
          while ($row = mysqli_fetch_assoc($query)) {
          echo"<div class='item'>
          <img src='../pict/".$row['image_destinasi']."' alt=''>
          <div class='carousel-caption'>
          </div>
          </div>";  
          }
          ?>

          <?php
          $query = mysqli_query($kon, "SELECT * FROM destinasi WHERE lokasi_destinasi = 'Sleman' ORDER BY RAND() LIMIT 1");
          while ($row = mysqli_fetch_assoc($query)) {
          echo"<div class='item'>
          <img src='../pict/".$row['image_destinasi']."' alt=''>
          <div class='carousel-caption'>
          </div>
          </div>";  
          }
          ?>
          
          </div>
          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
        </div>
      </div><!-- End Slide gallery -->
    </div>

    <!-- Thumbnails -->
    <div class="container thumbs">
    <?php
    $query = mysqli_query($kon, "SELECT * FROM destinasi ORDER BY RAND() LIMIT 3");
    while ($row = mysqli_fetch_assoc($query)) {
      $lokasi = $row['lokasi_destinasi'];
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
            </div>";
    }
  ?>  
    </div><!-- End Thumbnails -->
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
