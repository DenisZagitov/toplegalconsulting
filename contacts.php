<?php
// Содержит контакты для обратной связи
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
      <div class="contact">
        <h3>Контакты</h3>
        <p>
          <span class="contact-details">
            <p><strong>Адрес:</strong>
              РФ, г. Тюмень, ул.Водопроводная, дом 6 (угол с улицей Комсомольской)</p>
            <p><strong>Телефон:</strong>
              <a href="tel:+73452500045">+7 (3452) 500-045</a>
            </p>
            <p><strong>E-mail:</strong>
              <a href="mailto:mail@toplegalconsult.com">mail@toplegalconsult.com</a>
            </p>
          </span>
        </p>
      </div>
    </div>
  </div>
  <?php include("common/bottom.php"); ?>
</body>

</html>