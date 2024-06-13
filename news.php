<?php
// Содержит краткую информацию и ссылки на новости компании
session_start();
include("common/func.php");
bd_connect();
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL);
?>
<html>

<head>
  <meta charset="utf-8">
  <title>Юридическая компания «TopLegalConsulting»</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/mystyle.css">
  <link href="img/icon.ico" rel="shortcut icon" type="image/x-icon" />
</head>

<body class="body">
  <?php
  include("common/top.php");
  ?>
  <div class="main-content">
    <?php
    include("common/top1.php");
    ?>

    <div class="container">
      <h3><b><span class="style2">Новости юридического мира</span></b> </h3>
      <span class="style5">
        <p align=justify>
          Страница в разработке
        </p>
      </span>
    </div>
  </div>
  <?php
  include("common/bottom.php");
  ?>
</body>

</html>