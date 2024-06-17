<?php
// Содержит процедуры и функции, которые необходимо выполнить для связи страниц сайта с базой данных и вывода списка договоров на страницу сайта с последующим выводом на печать
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
  <link rel="stylesheet" href="/css/table.css">
  <link href="/img/fav-tlc.png" rel="shortcut icon" type="image/x-icon">
</head>

<body class="body">
  <?php include("common/top.php"); ?>
  <div class="main-content">
    <?php include("common/top1.php"); ?>
    <div class="page-content">
      <h3>Наши договора</h3>
      <?php
      $sql = "SELECT * FROM otchet";
      $q = mysqli_query($db, $sql);
      ?>
      <?php if (mysqli_num_rows($q) > 0) : ?>
        <table>
          <thead>
            <tr>
              <th>Номер договора</th>
              <th>Вид договора</th>
              <th>Статус</th>
              <th>Дата заключения</th>
              <th>Дата окончания</th>
              <th>Сумма договора</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($q)) : ?>
              <tr>
                <td><?= isset($row['Номер договора']) ? htmlspecialchars($row['Номер договора']) : '' ?></td>
                <td><?= isset($row['Вид договора']) ? htmlspecialchars($row['Вид договора']) : '' ?></td>
                <td><?= isset($row['Статус']) ? htmlspecialchars($row['Статус']) : '' ?></td>
                <td><?= isset($row['Дата заключения']) ? htmlspecialchars($row['Дата заключения']) : '' ?></td>
                <td><?= isset($row['Дата окончания']) ? htmlspecialchars($row['Дата окончания']) : '' ?></td>
                <td><?= isset($row['Сумма договора']) ? htmlspecialchars($row['Сумма договора']) : '' ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      <?php else : ?>
        <p>Нет данных для отображения.</p>
      <?php endif; ?>

      <div class="print-section">
        <button onclick="window.print();" class="btn-new">Печать</button>
      </div>

      <div class="home-section">
        <a href="/"><button class="btn-new">На Главную</button></a>
      </div>
    </div>
  </div>
  <?php include("common/bottom.php"); ?>
</body>

</html>