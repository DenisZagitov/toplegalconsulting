<?php
// Содержит информацию о компании, предоставляемых услугах
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
      <h3>Главное правило делового мира: читай все, включая напечатанное мелким шрифтом.</h3>
      <span class="paragraph-text">
        <p>Юридическая компания ООО «TopLegalConsulting» предоставляет услуги комплексного юридического сопровождения по корпоративным и коммерческим вопросам в различных отраслях деятельности клиентов.</p>
        <p>Также компания разрабатывает и обеспечивает клиентов всеми необходимыми видами и формами внутренних и иных документов.</p>
        <p>Компания представляет интересы национальных и международных клиентов.</p>
        <p>В компании оказывают весь спектр юридических услуг как для физических, так и для юридических лиц.</p>
        <p>Для постоянных клиентов компания предлагает особые условия сотрудничества.</p>
        <p>Компания постоянно совершенствует свой сервис для клиентов, поэтому ждет от них предложений.</p>
      </span>
    </div>
  </div>
  <?php include("common/bottom.php"); ?>
</body>

</html>