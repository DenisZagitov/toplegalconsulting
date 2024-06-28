<?php
// Содержит краткую информацию и ссылки на новости компании
session_start();
include("common/func.php");
bd_connect();
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL);

// Извлечение новостей из базы данных
$query = "SELECT news_id, title, content, DATE_FORMAT(published_date, '%d.%m.%Y') as published_date FROM news ORDER BY published_date DESC";
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
      <h3>Новости юридического мира</h3>
      <span class="paragraph-text">
        <?php if (mysqli_num_rows($result) > 0) : ?>
          <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="news-item">
              <div class="news_date">Дата публикации: <?= $row['published_date'] ?></div>
              <h4><a href="/news_detail.php?id=<?= $row['news_id'] ?>"><?= $row['title'] ?></a></h4>
              <p><?= $row['content']?></p>
            </div>
          <?php endwhile; ?>
        <?php else : ?>
          <p>На данный момент новостей нет.</p>
        <?php endif; ?>
      </span>
    </div>
  </div>
  <?php include("common/bottom.php"); ?>
</body>

</html>