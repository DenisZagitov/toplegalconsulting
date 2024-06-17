<?php
// Содержит форму для подачи заявки на юридическую консультацию.
// Содержит компоненты для загрузки шаблонов договоров на компьютер
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
  <link href="/img/fav-tlc.png" rel="shortcut icon" type="image/x-icon">
</head>

<body class="body">
  <?php include("common/top.php"); ?>
  <div class="main-content">
    <?php include("common/top1.php"); ?>
    <div class="page-content">
      <div class="center-content">
        <h3>Загрузка шаблонов договоров</h3>
        <?php
        if (isset($_FILES['inputfile'])) {
          $destination_dir = __DIR__ . '/dogs/new/' . basename($_FILES['inputfile']['name']);
          if (move_uploaded_file($_FILES['inputfile']['tmp_name'], $destination_dir)) {
            echo "<p>Файл успешно загружен!</p>";
          } else {
            echo "<p>Ошибка при загрузке файла!</p>";
            switch ($_FILES['inputfile']['error']) {
              case UPLOAD_ERR_INI_SIZE:
                echo "<p>Размер файла превышает допустимый лимит.</p>";
                break;
              case UPLOAD_ERR_FORM_SIZE:
                echo "<p>Размер файла превышает указанный лимит в HTML-форме.</p>";
                break;
              case UPLOAD_ERR_PARTIAL:
                echo "<p>Файл был загружен только частично.</p>";
                break;
              case UPLOAD_ERR_NO_FILE:
                echo "<p>Файл не был загружен.</p>";
                break;
              case UPLOAD_ERR_NO_TMP_DIR:
                echo "<p>Отсутствует временная директория.</p>";
                break;
              case UPLOAD_ERR_CANT_WRITE:
                echo "<p>Не удалось записать файл на диск.</p>";
                break;
              case UPLOAD_ERR_EXTENSION:
                echo "<p>PHP-расширение остановило загрузку файла.</p>";
                break;
              default:
                echo "<p>Неизвестная ошибка.</p>";
                break;
            }
          }
        }
        ?>

        <form enctype='multipart/form-data' action='read.php' method="post" class="upload-form">
          <div class="form-group">
            <label for="inputfile"><span class="paragraph-text">Сохранить файл</span></label>
            <input class="form-control-file" type="file" id="inputfile" name="inputfile">
          </div>
          <div class="form-group">
            <input class="btn-new" type="submit" value="Нажмите для сохранения">
          </div>
        </form>

        <div class="doc-image-container">
          <div class="doc-item">
            <a href="/dogs/Договор на сопровождение исполнительного производства по земельно-имущественным спорам.docx" download>
              <img src="/img/blanc/1.jpg" alt="Договор на сопровождение исполнительного производства по земельно-имущественным спорам" />
            </a>
            <p>Шаблон договора на сопровождение исполнительного производства по земельно-имущественным спорам</p>
          </div>
          <div class="doc-item">
            <a href="/dogs/Договор оказания услуг с адвокатом.pdf" download>
              <img src="/img/blanc/2.jpg" alt="Договор оказания услуг с адвокатом" />
            </a>
            <p>Шаблон договора оказания услуг с адвокатом</p>
          </div>
          <div class="doc-item">
            <a href="/dogs/Договор оказания юридических услуг в пользу исполнителя.docx" download>
              <img src="/img/blanc/3.jpg" alt="Договор оказания юридических услуг в пользу исполнителя" />
            </a>
            <p>Шаблон договора оказания юридических услуг в пользу исполнителя</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include("common/bottom.php"); ?>
</body>

</html>