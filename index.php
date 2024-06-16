<?php
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
      <h3>Самые популярные</h3>
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Номер договора</th>
              <th>Вид договора</th>
              <th>Сумма договора</th>
              <th>Контрагент</th>
              <th>Ответственный юрист</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT `kartochka_dogovora`.`Номер_договора`,`vid_dogovora`.`Вид договора`,`kartochka_dogovora`.`Сумма договора`, 
                        `kontragentu`.`Контрагент`,`sotrudniki`.`ФИО`
                        FROM `vid_dogovora` INNER JOIN (`kontragentu` INNER JOIN (`sotrudniki` INNER JOIN `kartochka_dogovora` 
                        ON `sotrudniki`.`Табельный номер`=`kartochka_dogovora`.`Ответственный`) 
                        ON `kontragentu`.`Код`=`kartochka_dogovora`.`Контрагент`) ON `vid_dogovora`.`ID_вида`=`kartochka_dogovora`.`ID_вида` 
                        ORDER BY `Сумма договора` ASC LIMIT 5";
            $q = mysqli_query($db, $sql);
            if (mysqli_num_rows($q) > 0) :
              while ($row = mysqli_fetch_array($q, MYSQLI_ASSOC)) : ?>
                <tr>
                  <td>
                    <a href="/read.php">
                      <img src="img/logo2.png" alt="Загрузить" width="50" height="50">
                    </a>
                  </td>
                  <td><?= $row['Номер_договора'] ?></td>
                  <td><?= $row['Вид договора'] ?></td>
                  <td><?= $row['Сумма договора'] ?></td>
                  <td><?= $row['Контрагент'] ?></td>
                  <td><?= $row['ФИО'] ?></td>
                </tr>
            <?php endwhile;
            endif; ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
  <?php include("common/bottom.php"); ?>

</body>

</html>