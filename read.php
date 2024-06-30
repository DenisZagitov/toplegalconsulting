<?php
session_start();
include("common/func.php");
bd_connect();
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL);

// Проверка на авторизацию пользователя
$authorized = isset($_SESSION['name_client']);
$user_id = $_SESSION['user_id'] ?? null; // Идентификатор клиента
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
        <h3>Скачать шаблон договора</h3>
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
        <?php if ($authorized) : ?>
          <?php

          if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['inputfile'])) {
            // Извлекаем оригинальное имя файла из загруженного файла
            $original_filename = basename($_FILES['inputfile']['name']);
            // Указываем директорию и имя для сохранения файла
            $destination_dir = __DIR__ . '/dogs/new/' . $original_filename;
            // Перемещаем загруженный файл в указанную директорию
            if (move_uploaded_file($_FILES['inputfile']['tmp_name'], $destination_dir)) {
              // Получаем комментарий из POST-запроса
              $comment = $_POST['comment'];
              // Получаем ID клиента из сессии
              $user_id = $_SESSION['user_id'];  // Убедитесь, что этот ключ существует в сессии
              // Подготовка SQL-запроса для вставки данных в таблицу contract
              $stmt = $db->prepare("INSERT INTO contract (file_path, comment, user_id, uploaded_at) VALUES (?, ?, ?, NOW())");
              // Привязываем параметры к SQL-запросу
              $stmt->bind_param("ssi", $destination_dir, $comment, $user_id);
              // Выполняем SQL-запрос
              if ($stmt->execute()) {
                echo "<p>Файл ". $original_filename ." успешно загружен и информация сохранена в базе данных!</p>";
              } else {
                echo "<p>Ошибка при сохранении информации в базе данных: " . $stmt->error . "</p>";
              }
              // Закрываем подготовленный запрос
              $stmt->close();
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

          <form enctype='multipart/form-data' action='' method="post" class="upload-form">
            <div class="form-group">
              <label for="inputfile"><span class="paragraph-text">Загрузить заполненный шаблон договора</span></label>
              <input class="form-control-file" type="file" id="inputfile" name="inputfile">
            </div>
            <div class="form-group">
              <label for="comment"><span class="paragraph-text">Комментарий для юриста:</span></label>
              <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <div class="form-group">
              <input class="btn-new" type="submit" value="Нажмите для сохранения">
            </div>
          </form>
        <?php else : ?>
          <p>Вы должны войти в систему, чтобы загрузить файл.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php include("common/bottom.php"); ?>
</body>

</html>