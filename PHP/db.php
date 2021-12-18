<?php
$site_key = '';
$secret_key = '';

// ONLINE (infinityfree)=============

// $server = 'sql108.epizy.com';
// $username = 'epiz_29581335';
// $password = 'bTEi09aoTZ9P';
// $dbname = 'epiz_29581335_new_template'; 

$website_url = "www.website-template.great-site.net";

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