<?php
//website url needed for forgot password
$website_url = "http://gdarcht.com";

// ONLINE ROMARG =============
// $server = 'server-0267.whmpanels.com';
// $username = 'r97625gdar_db_user';
// $password = 'lhP[e^Chvv^0';
// $dbname = 'r97625gdar_geometrik'; 

// ONLINE EARTHLINK =============
// $server = 'sql5c38c.carrierzone.com';
// $username = 'gdarchtcom166742';
// $password = 'Geo2022!';
// $dbname = 'geometrik_gdarchtcom166742'; 

//LOCAL=================================
  $server = 'localhost';
  $username = 'root';
  $password = '';
  $dbname = 'geometrik';    

  $connection = mysqli_connect($server, $username, $password, $dbname);

if (!$connection) {
  die("Failed to connect to MySQL: " . mysqli_connect_error()) ;
}
?>