<?php
// Содержит информацию о компании, предоставляемых услугах
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
</head>

<body class="body">
  <?
  include("common/top.php");
  ?>
  <br> <br>
  <h3><b><span class="style2">Главное правило делового мира: читай все, включая напечатанное мелким шрифтом.</span></b> </h3>
  <span class="style5">
    <br>
    <p align=justify>
      Юридическая компания ООО «TopLegalConsulting» предоставляет услуги комплексного юридического сопровождения по корпоративным и
      коммерческим вопросам в различных отраслях деятельности клиентов.
      <br>
    <p align=justify>Также компания разрабатывает и
      обеспечивает клиентов всеми необходимыми видами и формами внутренних и иных документов.</p <br>
    <p align=justify>Компания представляет интересы национальных и международных клиентов.</p <br>
    <p align=justify>В компании оказывают весь спектр юридических услуг как для
      физических, так и для юридических лиц.</p <br>
    <p align=justify>Для постоянных клиентов компания предлагает особые условия сотрудничества.</p <br>
    <p align=justify>Компания постоянно совершенствует свой сервис для клиентов, поэтому ждет от них предложений.</p>
  </span>

</body>

</html>
<?php include("common/bottom.php"); ?>