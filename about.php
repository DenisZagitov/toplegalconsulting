<?php
// Содержит информацию о компании, предоставляемых услугах
session_start();
include("common/func.php");
bd_connect();
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL);
// Извлечение сотрудников из базы данных
$query = "SELECT name, degree, position FROM employee;";
$result = mysqli_query($db, $query);
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
      <h3>Наши сотрудники</h3>
      <span class="employee-list">
        <?php if (mysqli_num_rows($result) > 0) : ?>
          <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="employee-card">
              <div class="employee-position"><?= $row['position'] ?></div>
              <div class="employee-degree"><?= $row['degree'] ?></div>
              <div class="employee-name"><?= $row['name'] ?></div>
            </div>
          <?php endwhile; ?>
        <?php else : ?>
          <p>На данный момент информации о сотрудниках нет.</p>
        <?php endif; ?>
      </span>
      <h3>Отзывы</h3>
      <div class="review-list">
        <div class="review-item">
          <div class="client-name">Иван Петров</div>
          <div class="review-text">Отличная компания, помогли решить сложную юридическую проблему быстро и качественно.</div>
        </div>
        <div class="review-item">
          <div class="client-name">Елена Сидорова</div>
          <div class="review-text">Спасибо за профессиональный подход и оперативное решение наших вопросов. Рекомендую!</div>
        </div>
        <div class="review-item">
          <div class="client-name">Алексей Иванов</div>
          <div class="review-text">Отличная команда юристов, всегда на связи и готовы помочь. Буду обращаться еще.</div>
        </div>
      </div>
    </div>
  </div>
  <?php include("common/bottom.php"); ?>
</body>

</html>
