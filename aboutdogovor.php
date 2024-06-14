<?php
// Содержит информацию о видах договоров на юридические услуги,
// документах для составления договора, правилах и условиях составления договоров
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
  <link rel="stylesheet" href="/css/style.css">
  <link href="img/icon.ico" rel="shortcut icon" type="image/x-icon" />
</head>

<body class="body">
  <?
  include("common/top.php");
  ?>
  <div class="main-content">
    <?php
    include("common/top1.php");
    ?>
    <div class="container">
  <span class="style8">Предоставляемые услуги</span>
  <br>
  <?
  include("common/table.php");
  ?>
  <br>
  <p align=center><span class="style8"><b>Общие правила заключения договоров</b></span></p>
  <span class="style5">
    <p align=justify>Договор – одно из главных оснований возникновения гражданско-правовых отношений.
      Перед заключением договора условия сделки проверяют на соответствие требованиям закона и проводят проверку контрагента. </p>
    <p align=justify>Договор можно заключить в виде единого документа, путем акцепта оферты или путем обмена письмами.</p>
    <p align=justify>Если закон не предусматривает письменную форму конкретного договора, договор можно заключить устно.</p>
    <p align=justify>Правила заключения договора содержит подраздел 2 ГК РФ. </p>
    <p align=justify>Перед заключением договора нужно проверить контрагента и проанализировать условия сделки.</p>
    <p align=justify>Порядок заключения договора включает в себя проверку контрагента.
      Компании необходимо проявить осмотрительность при выборе контрагента.
      Это не просто в ее интересах, проявление осмотрительности – прямое требование судов
      (постановление Пленума ВАС РФ от 12.10.2006 № 53).</p>
    <p align=justify>Нужно проверить, как контрагент ведет сделки, не является ли фирмой-однодневкой,
      не находится ли под угрозой банкротства или в процессе ликвидации и многое другое.</p>
  </span>
  </div>
  </div>
</body>

</html>
<?php include("common/bottom.php"); ?>