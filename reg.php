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
    $email = mysqli_real_escape_string($db, $_GET['email']);
    $password = mysqli_real_escape_string($db, $_GET['current-password']);
    $q_guest = mysqli_query($db, "SELECT `user_id`,`name`, `role_id` FROM `user` WHERE `email`='$email' AND `password`='$password' limit 1");
    if (mysqli_num_rows($q_guest) == 1) {
        $row_q_guest = mysqli_fetch_array($q_guest, MYSQLI_NUM);
        $_SESSION['user_id'] = $row_q_guest[0];
        $_SESSION['name_client'] = $row_q_guest[1];
        $_SESSION['role_id'] = $row_q_guest[2];
    }
    header("Location: /");
    exit();
} elseif (isset($_POST['reg']) and $_POST['name'] != '' and $_POST['email'] != '' and $_POST['password'] != '' and $_POST['address'] != '' and $_POST['phone'] != '') {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $comment = mysqli_real_escape_string($db, $_POST['comment']);

    $sql = "INSERT INTO `user` (`name`, `email`, `password`, `address`, `phone`, `comment`) VALUES ('$name', '$email', '$password', '$address', '$phone', '$comment')";

    if (mysqli_query($db, $sql)) {
        $_SESSION['success_message'] = "Регистрация прошла успешно!";
        header("Location: /reg.php");
        exit();
    } else {
        echo "Error: " . $sql . "" . mysqli_error($db);
    }
} elseif (isset($_GET['exit'])) {
    unset($_SESSION['user_id']);
    unset($_SESSION['name_client']);
    header("Location: /");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">

<?php include("common/head.php"); ?>


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
                    <label class="form-label" for="email">Контактный e-mail*</label>
                    <input class="form-control" id="email" name="email" type="text" value="">
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Пароль для входа на сайт*</label>
                    <input class="form-control" id="password" name="password" type="new-password" size="20" maxlength="20">
                </div>
                <div class="form-group">
                    <label class="form-label" for="address">Адрес*</label>
                    <input class="form-control" id="address" name="address" value="">
                </div>
                <div class="form-group">
                    <label class="form-label" for="phone">Контактный телефон*</label>
                    <input class="form-control" id="phone" name="phone" type="text">
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
    <?php include("common/footer.php"); ?>
</body>

</html>

<?php
ob_end_flush(); // Завершаем и отправляем буфер
?>