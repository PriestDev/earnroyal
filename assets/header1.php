<?php 
    session_start();
    require 'details.php';
    // include 'ip_security.php';
    
    if (isset($_GET['refer']) && $_GET['refer'] != null) {
        $domain = DOMAIN;
            header('location: https://'.$domain.'/user/register.php');
            $_SESSION['ref'] = $_GET['refer'];
      } else {
          
      }
?>


<!doctype html>
<html lang="en" class="dark">
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= NAME ?> - Home</title>
    <link rel="icon" href="uploads/<?= FAV ?>" />
    <link href="style.css" rel="stylesheet" />
  </head>