<?php include "PHP/db.php" ?>
<?php include "admin/includes/functions.php" ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="img/">
    <meta charset="UTF-8" lang="EN">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- flickity slider style -->
    <link rel="stylesheet" href="css/flickity.min.css" cmedia="screen">
    <link rel="stylesheet" href="css/fullscreen.css" cmedia="screen">
    <!-- custom style -->
    <link rel="stylesheet" href="css/style_v3.css">
        <!-- CKEditor output style -->
        <link rel="stylesheet" href="admin/dist/css/ckeditor.css">
    <title>Geometrik</title>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $site_key ?>"></script>

</head>

<body>
<div class="preloader">
    <img src="img/" alt="">
</div>
<?php include "PHP/to-top-arrow.php"; ?>