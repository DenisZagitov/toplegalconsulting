<?php
//Главная страница сайта. Содержит процедуры и функции, которые необходимо выполнить для работы с остальными страницами сайта.
session_start();
include("common/func.php");
bd_connect();
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL);
// Получение параметра type из URL
$type = isset($_GET['type']) ? mysqli_real_escape_string($db, $_GET['type']) : '';
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <title>Юридическая компания «TopLegalConsulting»</title>
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/header.css">
  <link rel="stylesheet" href="/css/form.css">
  <link rel="stylesheet" href="/css/table.css">
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

      <h3>Примеры расценок на наши услуги</h3>
      <?php
      $sql = "SELECT * FROM report";
      if (!empty($type)) {
        $sql .= " WHERE `Вид договора` = '$type'";
      }
      $q = mysqli_query($db, $sql);
      ?>
      <div>
        <?php if (mysqli_num_rows($q) > 0) : ?>
          <table>
            <thead>
              <tr>
                <th>Вид договора</th>
                <th>Сумма договора</th>
                <th>Статус</th>
                <th>Дата заключения</th>
                <th>Дата окончания</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_assoc($q)) : ?>
                <tr>
                  <td><?= isset($row['Вид договора']) ? htmlspecialchars($row['Вид договора']) : '' ?></td>
                  <td><?= isset($row['Сумма договора']) ? htmlspecialchars($row['Сумма договора']) : '' ?></td>
                  <td><?= isset($row['Статус']) ? htmlspecialchars($row['Статус']) : '' ?></td>
                  <td><?= isset($row['Дата заключения']) ? htmlspecialchars($row['Дата заключения']) : '' ?></td>
                  <td><?= isset($row['Дата окончания']) ? htmlspecialchars($row['Дата окончания']) : '' ?></td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        <?php else : ?>
          <p>Нет данных для отображения.</p>
        <?php endif; ?>
      </div>
      <div class="btn-container">
        <button onclick="window.print();" class="btn-new">Печать</button>
      <?
        if (!empty($type))  {
          ?>
          <a href="/">
            <button class="btn-new">Сброс фильтра</button>
          </a>
          <?php }?>
        </div>
          

    </div>

  </div>
  <?php include("common/bottom.php"); ?>

</body>

</html>