<?php
// Содержит компоненты для загрузки шаблонов договоров на компьютер
session_start();
include("common/func.php");
bd_connect();
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL);
include("common/top.php");
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <title>Юридическая компания «TopLegalConsulting»</title>
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <link href="css/header.css" rel="stylesheet" type="text/css">
  <link href="img/icon.ico" rel="shortcut icon" type="image/x-icon" />
</head>

<body class="body">
  <center>
    <table>
      <tr>
        <td><span class="style8"><b>Загрузка шаблонов договоров</b></span></td>
      </tr>
    </table>
    <?php
    if (isset($_FILES['inputfile'])) { // Проверяем, загрузил ли пользователь файл
      $destination_dir = __DIR__ . '/' . basename($_FILES['inputfile']['name']); // Директория для размещения файла
      if (move_uploaded_file($_FILES['inputfile']['tmp_name'], $destination_dir)) { // Перемещаем файл в желаемую директорию
        echo "<p>Файл успешно загружен!</p>";
      } else {
        echo "<p>Ошибка при загрузке файла!</p>";
        // Добавляем вывод информации об ошибке
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
    <br>
    <form enctype='multipart/form-data' action='read.php' method="post">
      <label for="inputfile"><span class="style5">Сохранить файл</span></label>
      <input class="btn-new1" type="file" id="inputfile" name="inputfile">
      <br>
      <input class="btn-new1" type="submit" value="Нажмите для сохранения">
    </form>
    <br>
    <table border=3>
      <tr>
        <td><img src="/img/blanc/1.jpg" width="250" height="400" /></td>
        <td><img src="/img/blanc/2.jpg" width="250" height="400" /></td>
        <td><img src="/img/blanc/3.jpg" width="250" height="400" /></td>
      </tr>
    </table>
  </center>
</body>

</html>
<?php include("common/bottom.php"); ?>