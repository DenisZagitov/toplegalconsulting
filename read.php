<?php
session_start();
include("common/func.php");
bd_connect();
include("common/top.php");
?>
<html>

<head>
  <meta charset="utf-8">
  <title>Юридическая компания «TopLegalConsulting»</title>
  <link rel="stylesheet" type="text/css" href="style.css">
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
    if (isset($_FILES)) { // Проверяем, загрузил ли пользователь файл
      $destination_dir = __DIR__ . '/' . $_FILES['inputfile']['name']; // Директория для размещения файла
      move_uploaded_file($_FILES['inputfile']['tmp_name'], $destination_dir); // Перемещаем файл в желаемую директорию
    }
    ?>
    <br>
    <form enctype='multipart/form-data' action='read.php' method="post">
      <label for="inputfile"><span class="style5">Сохранить файл</span></label>
      <input class="btn-new1" type="file" id="inputfile" name="inputfile">
      <br>
      <input class="btn-new1" type="submit" value="Нажмите для сохранения" onClick="alert('Файл сохранен!')">
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