<?php
// Главная страница сайта. Содержит процедуры и функции, которые необходимо выполнить для работы с остальными страницами сайта.
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
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/img/fav-tlc.png" rel="shortcut icon" type="image/x-icon">
  <link href="/css/main.css" rel="stylesheet">
</head>

<body>

  <?php include("common/top.php"); ?>
  <div class="container mt-4">
    <div class="row">
      <div class="col-lg-4 col-md-12 mb-4">
        <?php include("common/top1.php"); ?>
      </div>
      <div class="col-lg-8 col-md-12">
        <h3 class="main-heading">Главное правило делового мира: читай все, включая напечатанное мелким шрифтом.</h3>
        <div class="paragraph-text">
          <p>Юридическая компания ООО «TopLegalConsulting» предоставляет услуги комплексного юридического сопровождения по корпоративным и коммерческим вопросам в различных отраслях деятельности клиентов.</p>
          <p>Также компания разрабатывает и обеспечивает клиентов всеми необходимыми видами и формами внутренних и иных документов.</p>
          <p>Компания представляет интересы национальных и международных клиентов.</p>
          <p>В компании оказывают весь спектр юридических услуг как для физических, так и для юридических лиц.</p>
          <p>Для постоянных клиентов компания предлагает особые условия сотрудничества.</p>
          <p>Компания постоянно совершенствует свой сервис для клиентов, поэтому ждет от них предложений.</p>
        </div>

        <h3 class="mt-4">Примеры расценок на наши услуги</h3>
        <?php
        $sql = "SELECT * FROM report";
        if (!empty($type)) {
          $sql .= " WHERE `Вид договора` = '$type'";
        }
        $q = mysqli_query($db, $sql);
        ?>
        <div>
          <?php if (mysqli_num_rows($q) > 0) : ?>
            <table class="table table-striped">
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
        <div class="btn-container mt-3">
          <button onclick="window.print();" class="btn btn-primary">Печать</button>
          <?php if (!empty($type)) : ?>
            <a href="/">
              <button class="btn btn-secondary">Сброс фильтра</button>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?php include("common/bottom.php"); ?>

  <script src="/js/jquery-3.5.1.slim.min.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</body>

</html>