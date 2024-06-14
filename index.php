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
  <meta name="description" content="TopLegalConsulting">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Denis Zagitov">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Юридическая компания «TopLegalConsulting»</title>
  <link href="img/icon.ico" rel="shortcut icon" type="image/x-icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/mystyle.css">
  <link rel="stylesheet" href="/css/styles.css">
</head>

<body class="body">

  <div class="main-container">
    <header class="blog-header py-3">
      <div class="container d-flex justify-content-between align-items-center">
        <div class="logo-container">
          <a href="#" class="logo"><img src="img/hotpng.png" alt="Лого"></a>
        </div>
        <div class="contact-info d-flex align-items-center">
          <div class="phone-info d-flex flex-column align-items-end">
            <p class="phone-number d-flex align-items-center">
              <img src="img/call.png" width="50" height="50" class="mr-2">
              +7 (3452) 500-045
            </p>
            <p class="working-hours d-flex align-items-center">
              <img src="img/time.png" width="50" height="50" class="mr-2">
              9.00 - 20.00
            </p>
          </div>
        </div>
      </div>
    </header>

    <nav class="main-nav">
      <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="nav-link py-2 d-none d-md-inline-block" href="/">Главная</a>
        <a class="nav-link py-2 d-none d-md-inline-block" href="/about.php">О нас</a>
        <a class="nav-link py-2 d-none d-md-inline-block" href="/aboutdogovor.php">Услуги</a>
        <a class="nav-link py-2 d-none d-md-inline-block" href="/otchet.php">Договора</a>
        <a class="nav-link py-2 d-none d-md-inline-block" href="/read.php">Помощь</a>
        <a class="nav-link py-2 d-none d-md-inline-block" href="news.php">Новости</a>
        <a class="nav-link py-2 d-none d-md-inline-block" href="/contacts.php">Контакты</a>
      </div>
    </nav>

    <div class="text-center my-4">Юридическая компания «TopLegalConsulting»</div>
  </div>

  <div class="container my-4">
    <div class="row">
      <div class="col-md-4">
        <div class="content-container">
          <div id="contracts-section">
            <strong class="section-title">Категории договоров:<br></strong>
            <div class="Category">
              <span class="contract-category">
                <p><a href="/?vid=catalog&amp;type=1">Договор на сопровождение исполнительного производства по земельно-имущественным спорам</a></p>
              </span>
              <span class="contract-category">
                <p><a href="/?vid=catalog&amp;type=2">Договор оказания юридических услуг в пользу исполнителя</a></p>
              </span>
              <span class="contract-category">
                <p><a href="/?vid=catalog&amp;type=3">Договор оказания услуг с адвокатом</a></p>
              </span>
            </div>
          </div>

          <div class="auth-container">
            <div id="auth-section">
              <strong class="auth-title">
                <form method="get" action="/reg.php">
                  Авторизация:
                  <p>e-mail: <input name="mail" type="text" size="30" maxlength="50"></p>
                  <p>пароль: <input name="pas" type="password" size="30" maxlength="20"> </p>
                  <p><input class="btn btn-primary" name="enter" type="submit" value="Войти">
                    <a href="/reg.php" class="btn btn-secondary">Регистрация</a>
                  </p>
                </form>
              </strong>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="container my-4">
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
    </div>
  </div>

  <?php
  include("common/bottom.php");
  ?>  

</body>

</html>