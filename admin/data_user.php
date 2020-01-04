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
      <div class="add">
        <a href="form_input_new_user.html" role="button" class="btn btn-success">Add User</a>
    </div>
    </div>

    <div class="container thumbs">
    <h1 align="center">Data User</h1>
    <?php
      include "../koneksi.php";
      $lokasi = "";
      $query = mysqli_query($kon, "SELECT * FROM user ORDER BY username DESC");
      echo "
              <table border='1' align='center' cellpadding='5' cellspacing='10'>
                <th>Nama</th>
                <th>Gender</th>
                <th>Email</th>
                <th>No. Telp</th>
                <th width='350'>Alamat</th>
                <th>Hak Akses</th>
                <th>Aksi</th>
          ";
      $status = "Member";
      while ($row = mysqli_fetch_assoc($query)) {
        if ($row['status'] == 1) {
          $status = "Admin";
        }
        echo "
              <tr>
                <td align='center'>".$row['name']."</td>
                <td align='center'>".$row['gender']."</td>
                <td align='center'>".$row['email']."</td>
                <td align='center'>".$row['notelp']."</td>
                <td align='center'>".$row['address']."</td>
                <td align='center'>".$status."</td>
                <td align='center'><a href='form_edit_data_user.php?username=".$row['username']."'>Edit</a><br/><a href='hapus_user.php?username=".$row['username']."'>Hapus</a></td>
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
