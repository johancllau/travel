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
    $kapasitas = $_POST['kapasitas'];

	$foto = $_FILES['foto']['name'];
	$tmpName = $_FILES['foto']['tmp_name'];
	$size = $_FILES['foto']['size'];
	$type = $_FILES['foto']['type'];

	$maxsize = 2500000;
	$typeYgBoleh = array("image/jpeg","image/png","image/pjpeg");
	$dirFoto = "../pict";

	if (!is_dir($dirFoto))
	mkdir($dirFoto);

	$fileTujuanFoto = $dirFoto."/".$foto;
	$dirThumb = "thumb";

	if (!is_dir($dirThumb))
	mkdir($dirThumb);

	$fileTujuanThumb = $dirThumb."/t_".$foto;
	$dataValid="Ya";

	if ($size>0)
	{
		if($size>$maxsize)	{
			echo "<H3 align='center'>Ukuran Foto Terlalu Besar!!<H3>";
         	echo "<table border='0' align='center'>
                	<tr>
                  		<td><input type='button' value='kembali' onClick='self.history.back()'></td>
                	</tr>
               	 </table></body>";
			$dataValid = "TIDAK";
			return;
		}
		if (!in_array ($type, $typeYgBoleh)) {
			echo "<H3 align='center'>Type Fiel Tidak di Kenal!!<H3>";
         	echo "<table border='0' align='center'>
                	<tr>
                  		<td><input type='button' value='kembali' onClick='self.history.back()'></td>
                	</tr>
               	 </table></body>";
			$dataValid = "TIDAK";
			return;
		}
	}

	if(strlen(trim($foto)) == 0) {
		echo "<H3 align='center'>Foto Harus di Masukan!!<H3>";
        echo "<table border='0' align='center'>
                	<tr>
                  		<td><input type='button' value='kembali' onClick='self.history.back()'></td>
                	</tr>
               </table></body>";
		$dataValid = "TIDAK";
		return;
	}

    if(strlen(trim($kapasitas)) == 0) {
		echo "<H3 align='center'>kapasitas Harus dipilih!!<H3>";
        echo "<table border='0' align='center'>
                	<tr>
                  		<td><input type='button' value='kembali' onClick='self.history.back()'></td>
                	</tr>
               </table></body>";
		$dataValid = "TIDAK";
		return;
	}

	if($dataValid == "TIDAK") {
		echo "<H3 align='center'>Masih Ada Kealahan, Silahkan di Perbaiki!!<H3>";
        echo "<table border='0' align='center'>
                	<tr>
                  		<td><input type='button' value='kembali' onClick='self.history.back()'></td>
                	</tr>
               </table></body>";
		$dataValid = "TIDAK";
		return;
	}

	include "../koneksi.php";
	
	$sql = "INSERT INTO mobil_travel (kapasitas, image_travell) VALUES ('$kapasitas', '$foto')";
	$hasil = mysqli_query ($kon,$sql);

	if(!$hasil)	{
			echo "<H3 align='center'>Gagal Simpan!!, Silahkan di Ulangi!!<H3>";
         	echo "<table border='0' align='center'>
                	<tr>
                  		<td><input type='button' value='kembali' onClick='self.history.back()'></td>
                	</tr>
               	 </table></body>";
			$dataValid = "TIDAK";
			return;
	}
	else {
		echo '<script language="javascript">alert("Berhasil Menambahkan Data Travell Baru!"); document.location="travel.php";</script>';
	}

	if($size>0) {
		if (!move_uploaded_file ($tmpName, $fileTujuanFoto)) {
			echo "<H3 align='center'>Gagal Upload Gambar!!<H3>";
         	echo "<table border='0' align='center'>
                	<tr>
                  		<td><input type='button' value='kembali' onClick='self.history.back()'></td>
                	</tr>
               	 </table></body>";
			$dataValid = "TIDAK";
			return;
		}
		else {
			buat_thumbnail ($fileTujuanFoto,$fileTujuanThumb);
		}
	}

	function buat_thumbnail ($file_src,$file_dst)
	{
		list($w_src,$h_src,$type) = getImageSize ($file_src);
		switch($type)
		{
			case 1;
			$img_src = imagecreatefromgif($file_src);
			break;
			case 2;
			$img_src = imagecreatefromjpeg($file_src);
			break;
			case 3;
			$img_src = imagecreatefrompng($file_src);
			break;
		}
		$thumb = 100;
		if($w_src>$h_src)
		{
			$w_dst = $thumb;
			$h_dst = round ($thumb/$w_src*$h_src);
		}
		else
		{
			$w_dst = round($thumb/$h_src*$w_src);
			$h_dst=$thumb;
		}
		$img_dst = imagecreatetruecolor($w_dst,$h_dst);
		imagecopyresampled($img_dst,$img_src,0,0,0,0,$w_dst,$h_dst,$w_src,$h_src);
		imagejpeg($img_dst,$file_dst);
		imagedestroy($img_src);
		imagedestroy($img_dst);
	}
	
?>