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
      $id_destinasi = $_GET['id_destinasi'];
      include "koneksi.php";
      $query = mysqli_query($kon, "SELECT * FROM destinasi WHERE id_destinasi='$id_destinasi'");

      $nama   = "";
      $lokasi = "";
      $alamat = "";
      $images = "";
      $desc   = "";
      while ($row = mysqli_fetch_assoc($query)) {
        $nama = $row['nama_destinasi'];
        $lokasi = $row['lokasi_destinasi'];
        $alamat = $row['alamat_destinasi'];
        $images = $row['image_destinasi'];
        $desc = $row['description'];
      }
   ?>
    <!-- Slide gallery -->
    <div class="jumbotron">
      <div class="container">
        <div class="col-xs-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>
          <!-- Wrapper for slides -->

          <div class="carousel-inner">
            <div class="item active">
              <?php 
                  echo " <img src='pict/".$images."' alt=''>";
              ?>
              <div class="carousel-caption">
              </div>
            </div>
            <div class="item">
              <?php 
                echo " <img src='pict/".$images."' alt=''>";
              ?>
              <div class="carousel-caption">
              </div>
            </div>
            <div class="item">
              <?php 
                echo " <img src='pict/".$images."' alt=''>";
              ?>
              <div class="carousel-caption">
              </div>
            </div>
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

    <div class="container">
    <h3>
      <?php echo $nama; ?>
    </h3>
    <h4>
      <?php echo "Lokasi: ".$lokasi; ?>
    </h4>
    <h4>
      <?php 
        echo "Deskripsi: <br/>";
        echo "<p>".$desc."</p>"; 
      ?>
    </h4>
     <h4>
      <?php echo "Alamat: ".$alamat; ?>
    </h4>
  </div>

    <!-- Footer -->
    <?php
      include "footer.html";
    ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootshape.js"></script>
  </body>
</html>
