<?php
session_start();
include("common/func.php");
bd_connect();
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL);
?>
<html>

<head>
  <meta name="description" content="TopLegalConsulting">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Denis Zagitov">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Юридическая компания «TopLegalConsulting»</title>
  <link href="img/icon.ico" rel="shortcut icon" type="image/x-icon" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/style.css">
</head>


<body class="body">

  <?php
  include("common/top.php");
  ?>
  <div class="main-content">
    <?php
    include("common/top1.php");
    ?>
    <div class="page-content">

      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Номер договора</th>
              <th scope="col">Вид договора</th>
              <th scope="col">Сумма договора</th>
              <th scope="col">Контрагент</th>
              <th scope="col">Ответственный юрист</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT `kartochka_dogovora`.`Номер_договора`,`vid_dogovora`.`Вид договора`,`kartochka_dogovora`.`Сумма_договора`, 
                        `kontragentu`.`Контрагент`,`sotrudniki`.`ФИО`
                        FROM `vid_dogovora` INNER JOIN (`kontragentu` INNER JOIN (`sotrudniki` INNER JOIN `kartochka_dogovora` 
                        ON `sotrudniki`.`Табельный номер`=`kartochka_dogovora`.`Ответственный`) 
                        ON `kontragentu`.`Код`=`kartochka_dogovora`.`Контрагент`) ON `vid_dogovora`.`ID_вида`=`kartochka_dogovora`.`ID_вида` 
                        ORDER BY `Сумма_договора` ASC LIMIT 5";
            $q = mysqli_query($db, $sql);
            if (mysqli_num_rows($q) > 0) :
              while ($row = mysqli_fetch_array($q, MYSQLI_ASSOC)) : ?>
                <tr>
                  <td class="text-center">
                    <a href="/read.php">
                      <img src="img/logo2.png" alt="загрузить" width="50" height="50">
                    </a>
                  </td>
                  <td class="text-center"><?= $row['Номер_договора'] ?></td>
                  <td><?= $row['Вид договора'] ?></td>
                  <td class="text-center"><?= $row['Сумма_договора'] ?></td>
                  <td><?= $row['Контрагент'] ?></td>
                  <td class="text-center"><?= $row['ФИО'] ?></td>
                </tr>
            <?php endwhile;
            endif; ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
  <?php
  include("common/bottom.php");
  ?>

</body>

</html>