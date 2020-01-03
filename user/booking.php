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
<?php
	include "../koneksi.php";
	$sql = "select * from paket_tour";
	$hasil = mysqli_query($kon, $sql);
	if(!$hasil)
		die("Gagal query..".mysqli_error($kon));
?>

<h2>Daftar Paket Tour</h2><br><hr>
&nbsp; &nbsp; &nbsp;
<table border="1" align="center">
	<tr>
		<th width="100">Nama Paket Tour</th>
		<th width="100">Destinasi</th>
		<th width="100">Description</th>
		<th width="100">Harga</th>
		<th width="100"></th>
	</tr>
	<?php
		$no = 0;
		while ($row = mysqli_fetch_assoc($hasil))
		{
			echo " <tr>" ;
			echo " 	<td>".$row['nama_paket']." </td> ";
			echo "	<td>".$row['destinasi']." </td> ";
			echo "	<td>".$row['description']." </td> ";
			echo " 	<td>".$row['harga_paket']." </td> ";
			echo "	<td> ";
			echo "	<a href='form_booking.php'>Book Now</a>";
			echo "	</td>";
			echo " </tr>" ;
		}
	?>
</table>

	</body>