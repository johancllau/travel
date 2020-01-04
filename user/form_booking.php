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
		<link rel="stylesheet" href="../css/jquery-ui.css" type="text/css"/>
		<script src="jquery-1.10.2.js" type="text/javascript"></script>
		<script src="jquery-ui.js" type="text/javascript"></script>
		<script>
  			$(function() {
    			$( "#datepicker" ).datepicker();
  			});
		</script>
	</head>
<body>
	<h3 align="center">Form Input Data Booking</h3>
	<br/>
	<form = name="form-Booking" action="save_booking.php" method="post" enctype="multipart/form-data">
		<table border="0" align="center" cellpadding="10">
			<tr>
				<td><label for="Tanggal">Tanggal Tour</label></td>
				<td><input type="text" name="tanggal_tour" id="datepicker" /></td>
			</tr>
	
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="submit" value="Submit" align="center" class="btn btn-primary">
					<input type="reset" name="reset" value="Reset" align="center" class="btn btn-success">
					<input type="button" name="cancel" value="Cancel" align="center" onclick="self.history.back()" class="btn btn-danger">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>