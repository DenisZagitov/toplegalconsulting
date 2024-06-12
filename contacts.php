<?php
// Содержит контакты для обратной связи
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
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <link href="css/header.css" rel="stylesheet" type="text/css">
  <link href="img/icon.ico" rel="shortcut icon" type="image/x-icon"/>
</head>

<body class="body">
  <?
  include("common/top.php");
  ?>
  <center>
    <br><br><br>
    <p>
      <span class="style5"><strong class="style8">Адрес:</strong>
        <br> <br>РФ, г. Тюмень, ул.Водопроводная, дом 6 (угол с улицей Комсомольской)
        <br> <br><strong class="style8">Телефон:</strong> +7 (3452) 500-045
        <br><br><strong class="style8">E-mail:</strong> mail@toplegalconsult.com
      </span>
    </p>
  </center>

</body>

</html>
</p>
<?php include("common/bottom.php"); ?>