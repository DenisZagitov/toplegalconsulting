<?php
// Страница регистрации клиента
ob_start(); // Включаем буферизацию вывода
session_start();
include("common/func.php");
bd_connect();
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL);

// Обработка логики до вывода HTML
if (isset($_GET['enter'])) {
    $mail = mysqli_real_escape_string($db, $_GET['mail']);
    $pas = mysqli_real_escape_string($db, $_GET['pas']);
    $q_guest = mysqli_query($db, "SELECT `id_client`,`name` FROM `clients` WHERE `mail`='$mail' AND `pas`='$pas' limit 1");
    if (mysqli_num_rows($q_guest) == 1) {
        $row_q_guest = mysqli_fetch_array($q_guest, MYSQLI_NUM);
        $_SESSION['id_client'] = $row_q_guest[0];
        $_SESSION['name_client'] = $row_q_guest[1];
    }
    header("Location: /");
    exit();
} elseif (isset($_POST['reg']) and $_POST['name'] != '' and $_POST['mail'] != '' and $_POST['pas'] != '' and $_POST['address'] != '' and $_POST['telefon'] != '') {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $mail = mysqli_real_escape_string($db, $_POST['mail']);
    $pas = mysqli_real_escape_string($db, $_POST['pas']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $telefon = mysqli_real_escape_string($db, $_POST['telefon']);
    $comment = mysqli_real_escape_string($db, $_POST['comment']);

    $sql = "INSERT INTO `clients` (`name`, `mail`, `pas`, `address`, `telefon`, `comment`) VALUES ('$name', '$mail', '$pas', '$address', '$telefon', '$comment')";

    if (mysqli_query($db, $sql)) {
        $_SESSION['success_message'] = "Регистрация прошла успешно!";
        header("Location: /reg.php");
        exit();
    } else {
        echo "Error: " . $sql . "" . mysqli_error($db);
    }
} elseif (isset($_GET['exit'])) {
    unset($_SESSION['id_client']);
    unset($_SESSION['name_client']);
    header("Location: /");
    exit();
}
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
            <?php if (isset($_SESSION['success_message'])) : ?>
                <div class="success-message">
                    <?= $_SESSION['success_message']; ?>
                    <?php unset($_SESSION['success_message']); ?>
                </div>
            <?php endif; ?>
            <form method="post" action="">
                <h3>Регистрация </h3>
                <div class="form-group">
                    <label class="form-label" for="name">Фамилия И.О.*</label>
                    <input class="form-control" id="name" name="name" type="text" value="">
                </div>
                <div class="form-group">
                    <label class="form-label" for="mail">Контактный e-mail*</label>
                    <input class="form-control" id="mail" name="mail" type="text" value="">
                </div>
                <div class="form-group">
                    <label class="form-label" for="pas">Пароль для входа на сайт*</label>
                    <input class="form-control" id="pas" name="pas" type="password" size="20" maxlength="20">
                </div>
                <div class="form-group">
                    <label class="form-label" for="address">Адрес*</label>
                    <input class="form-control" id="address" name="address" value="">
                </div>
                <div class="form-group">
                    <label class="form-label" for="telefon">Контактный телефон*</label>
                    <input class="form-control" id="telefon" name="telefon" type="text">
                </div>
                <div class="form-group">
                    <label class="form-label" for="comment">Комментарии</label>
                    <textarea class="form-control" id="comment" name="comment" style="height:70px"></textarea>
                </div>
                <div>
                    <i class="form-text">Поля отмеченные символом * обязательны для заполнения</i>
                </div>
                <div class="btn-container">
                    <input class="btn-new" name="reg" type="submit" value="Регистрация">
                </div>
            </form>
        </div>
    </div>
    <?php include("common/bottom.php"); ?>
</body>

</html>

<?php
ob_end_flush(); // Завершаем и отправляем буфер
?>