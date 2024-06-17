<?php
// Содержит информацию о видах договоров на юридические услуги, документах для составления договора, правилах и условиях составления договоров
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
  <link rel="stylesheet" href="/css/image-table.css">
  <link href="/img/fav-tlc.png" rel="shortcut icon" type="image/x-icon">
</head>

<body class="body">
  <?php include("common/top.php"); ?>
  <div class="main-content">
    <?php include("common/top1.php"); ?>
    <div class="page-content">
      <div class="services-table">
        <h3>Предоставляемые услуги</h3>
        <?php include("common/table.php"); ?>
      </div>
      <div class="contraction">
        <h3>Общие правила заключения договоров</h3>
        <span class="contraction-text">
          <p>Договор – одно из главных оснований возникновения гражданско-правовых отношений.
          <p>Перед заключением договора условия сделки проверяют на соответствие требованиям закона и проводят проверку контрагента.
          <p>Договор можно заключить в виде единого документа, путем акцепта оферты или путем обмена письмами.
          <p>Если закон не предусматривает письменную форму конкретного договора, договор можно заключить устно.
          <p>Правила заключения договора содержит подраздел 2 ГК РФ.
          <p>Перед заключением договора нужно проверить контрагента и проанализировать условия сделки.
          <p>Порядок заключения договора включает в себя проверку контрагента.
          <p>Компании необходимо проявить осмотрительность при выборе контрагента.
          <p>Это не просто в ее интересах, проявление осмотрительности – прямое требование судов (постановление Пленума ВАС РФ от 12.10.2006 № 53).
          <p>Нужно проверить, как контрагент ведет сделки, не является ли фирмой-однодневкой, не находится ли под угрозой банкротства или в процессе ликвидации и многое другое.</p>
        </span>
      </div>
    </div>
  </div>
  <?php include("common/bottom.php"); ?>
</body>

</html>