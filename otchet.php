<?php
// Содержит процедуры и функции, которые необходимо выполнить для связи страниц сайта с базой данных и вывода списка договоров на страницу сайта с последующим выводом на печать
session_start();
include("common/func.php");
bd_connect();
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL);

// Проверка на авторизацию пользователя и права доступа
if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 3) {
  header('Location: /'); // Перенаправление на главную страницу, если пользователь не авторизован или не имеет прав доступа
  exit;
}

// Получение параметра type из URL
$type = isset($_GET['type']) ? mysqli_real_escape_string($db, $_GET['type']) : '';
?>
<!DOCTYPE html>
<html lang="ru">

<?php include("common/head.php"); ?>

<body class="body">
  <?php include("common/top.php"); ?>
  <div class="main-content">
    <?php include("common/top1.php"); ?>
    <div class="page-content">
      <h3>Наши договоры</h3>
      <?php
      $sql = "SELECT * FROM report";
      $q = mysqli_query($db, $sql);
      ?>
      <div>
        <?php if (mysqli_num_rows($q) > 0) : ?>
          <table>
            <thead>
              <tr>
                <th>Номер договора</th>
                <th>Вид договора</th>
                <th>Сумма договора</th>
                <th>Контрагент</th>
                <th>Ответственный юрист</th>
                <th>Статус</th>
                <th>Дата заключения</th>
                <th>Дата окончания</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_assoc($q)) : ?>
                <tr>
                  <td><?= isset($row['Номер договора']) ? htmlspecialchars($row['Номер договора']) : '' ?></td>
                  <td><?= isset($row['Вид договора']) ? htmlspecialchars($row['Вид договора']) : '' ?></td>
                  <td><?= isset($row['Сумма договора']) ? htmlspecialchars($row['Сумма договора']) : '' ?></td>
                  <td><?= isset($row['Контрагент']) ? htmlspecialchars($row['Контрагент']) : '' ?></td>
                  <td><?= isset($row['Ответственный юрист']) ? htmlspecialchars($row['Ответственный юрист']) : '' ?></td>
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
      <div class="btn-container">
        <button onclick="window.print();" class="btn-new">Печать</button>
        <a href="/">
          <button class="btn-new">На Главную</button>
        </a>
      </div>
    </div>
  </div>
  <?php include("common/footer.php"); ?>
</body>

</html>