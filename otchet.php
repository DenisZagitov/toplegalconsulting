<?php
// Содержит процедуры и функции, которые необходимо выполнить для связи страниц сайта
// с базой данных и вывода списка договоров на страницу сайта с последующим выводом на печать
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/mystyle.css">
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
      <?php
      $sql = "SELECT * FROM otchet";
      $q = mysqli_query($db, $sql);

      if (mysqli_num_rows($q) > 0) {
        echo '<table width="100%" border="2" cellspacing="2" cellpadding="2">
        <tr>
          <th width="120" align="center" bgcolor="#F0F8FF"><font size="5">Номер договора</font></th>
          <th width="300" align="center" bgcolor="#F0F8FF"><font size="5">Вид договора</font></th>
          <th width="120" align="center" bgcolor="#F0F8FF"><font size="5">Статус</font></th>
          <th width="200" align="center" bgcolor="#F0F8FF"><font size="5">Дата заключения</font></th>
          <th width="200" align="center" bgcolor="#F0F8FF"><font size="5">Дата окончания</font></th>
          <th width="100" align="center" bgcolor="#F0F8FF"><font size="5">Сумма договора</font></th>
        </tr>';

        while ($row = mysqli_fetch_assoc($q)) {
          echo '<tr>
          <td align="center"><font size="5">' . (isset($row['Номер договора']) ? $row['Номер договора'] : '') . '</font></td>
          <td align="center"><font size="5">' . (isset($row['Вид договора']) ? $row['Вид договора'] : '') . '</font></td>
          <td align="center"><font size="5">' . (isset($row['Статус']) ? $row['Статус'] : '') . '</font></td>
          <td align="center"><font size="5">' . (isset($row['Дата заключения']) ? $row['Дата заключения'] : '') . '</font></td>
          <td align="center"><font size="5">' . (isset($row['Дата окончания']) ? $row['Дата окончания'] : '') . '</font></td>
          <td align="center"><font size="5">' . (isset($row['Сумма_договора']) ? $row['Сумма_договора'] : '') . '</font></td>
        </tr>';
        }

        echo '</table>';
      } else {
        echo '<p>Нет данных для отображения.</p>';
      }
      ?>
      <br><br>
      <center>
        <table>
          <tr class="style3u">
            <td><button onclick="window.print();" class="btn-new">Печать</button></td>
          </tr>
        </table>
        <br><br>
        <table>
          <tr class="style3u">
            <td><a href="/"><button class="btn-new">На Главную</button></a></td>
          </tr>
        </table>
      </center>
    </div>
    </div>
    <?php include("common/bottom.php"); ?>
</body>

</html>