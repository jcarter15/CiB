<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'lincioka_admin');
define('DB_PASSWORD', 'wearethebest');
define('DB_DATABASE', 'lincioka_cib8');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (!$conn) {
	die ("Connection failed: " . mysqli_connect_error());
}

$date_curr = date("Y-m-d");
$date_conv = new DateTime($date_curr);
$week = $date_conv->format("W");
?>