<?php
// Содержит краткую информацию и ссылки на новости компании
session_start();
include("common/func.php");
bd_connect();
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <title>Юридическая компания «TopLegalConsulting»</title>
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/header.css">
  <link rel="stylesheet" href="/css/form.css">
  <link href="/img/fav-tlc.png" rel="shortcut icon" type="image/x-icon">
</head>

<body class="body">
  <?php include("common/top.php"); ?>
  <div class="main-content">
    <?php include("common/top1.php"); ?>

    <div class="page-content">
      <h3>Новости юридического мира</h3>
      <span class="paragraph-text">
        <p>Страница в разработке</p>
      </span>
    </div>
  </div>
  <?php include("common/bottom.php"); ?>
</body>

</html>