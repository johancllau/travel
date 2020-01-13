<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
$host="localhost";
$user="root";
$dbName="travel";

$kon=mysqli_connect($host, $user);
if(!$kon)
	die("Gagal koneksi...");

$hasil=mysqli_select_db($kon, $dbName);
if(!$hasil){
	$hasil=mysqli_query($kon, "CREATE DATABASE $dbName");
	if($hasil) {
		die("gagal buat database");
	}
	else{
		$hasil=mysqli_select_db($kon, $dbName);
		if(!$hasil) die("gagal konek database");
	}
}
?>
