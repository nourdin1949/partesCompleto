<?php
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);
foreach (glob("/var/www/html/grupo1/dao/*.php") as $filename) {
  
	include_once $filename;
}

foreach (glob("/var/www/html/grupo1/DTO/*.php") as $filename) {
	include_once $filename;
}
?>