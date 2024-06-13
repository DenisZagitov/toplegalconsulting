<?php
session_start();
include("common/func.php");
bd_connect();
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL);
?>
<html>

<head>
  <meta charset="utf-8">
  <title>Юридическая компания «TopLegalConsulting»</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="img/icon.ico" rel="shortcut icon" type="image/x-icon" />
</head>

<body class="body">
  <?php
  include("common/top.php");
  if (isset($_GET['vid'])) {
    $vid = "catalog";
    $zag = "Наши договора";
    $sql = "SELECT `kartochka_dogovora`.`Номер_договора`,`vid_dogovora`.`Вид договора`,`kartochka_dogovora`.`Сумма_договора`, 
`kontragentu`.`Контрагент`,`sotrudniki`.`ФИО`
FROM `vid_dogovora` INNER JOIN (`kontragentu` INNER JOIN (`sotrudniki` INNER JOIN `kartochka_dogovora` 
ON `sotrudniki`.`Табельный номер`=`kartochka_dogovora`.`Ответственный`) 
ON `kontragentu`.`Код`=`kartochka_dogovora`.`Контрагент`) ON `vid_dogovora`.`ID_вида`=`kartochka_dogovora`.`ID_вида` AND `kartochka_dogovora`.`ID_вида`=" . $_GET['type'] . " 
    ";
    if (isset($_GET['sort']))
      if ($_GET['sort'] == 'Номер_договора') $sql .= " ORDER BY `Номер_договора` ASC";
      else $sql .= " ORDER BY `Сумма_договора` ASC";
  } else {
    $vid = 'popular';
    $zag = 'Самые популярные';
    $sql = "SELECT `kartochka_dogovora`.`Номер_договора`,`vid_dogovora`.`Вид договора`,`kartochka_dogovora`.`Сумма_договора`, `kontragentu`.`Контрагент`,`sotrudniki`.`ФИО`
FROM `vid_dogovora` INNER JOIN (`kontragentu` INNER JOIN (`sotrudniki` INNER JOIN `kartochka_dogovora` 
ON `sotrudniki`.`Табельный номер`=`kartochka_dogovora`.`Ответственный`) 
ON `kontragentu`.`Код`=`kartochka_dogovora`.`Контрагент`) ON `vid_dogovora`.`ID_вида`=`kartochka_dogovora`.`ID_вида` ORDER BY `Сумма_договора` ASC LIMIT 5";
  }
  ?>
  <strong style = "color:#2f2f2fe8;">
    <?= $zag; ?></strong><br />
  <?php
  $color = "red";
  $q = mysqli_query($db, $sql);
  if (mysqli_num_rows($q) > 0) {
    echo ' <table border="2" cellspacing="2" cellpadding="2" style="color:#2f2f2fe8; font-size:13px; width: 98%; margin:10px;">
    <tr>
        <td style="min-width: 50px; width:5%;" bgcolor=#F0F8FF>&nbsp;</td>
        <td style="min-width: 10px; width:5%;" align="center" bgcolor=#F0F8FF><b>';
    if ($vid == 'catalog') echo  '<a href="/?vid=catalog&type=' . $_GET['type'] . '&sort=Номер_договора">Номер договора</a>';
    else echo 'Номер договора</b>';
    echo '</td>
        <td style="min-width:100px; width:30%" align="center" bgcolor=#F0F8FF><b>Вид договора</b></td>
        <td style="min-width:100px; width:20%" align="center" bgcolor=#F0F8FF><b>Сумма договора</b></td>
        <td style="min-width:100px; width:20%" align="center" bgcolor=#F0F8FF><b>Контрагент</b></td>
        <td style="min-width:100px; width:20%" align="center" bgcolor=#F0F8FF><b>Ответственный юрист</b></td>
    </tr>';
    $show = 0;

    while ($row = mysqli_fetch_array($q, MYSQLI_ASSOC)) {
      if ($vid == 'catalog' and $show == 0) {
        echo '
            <tr class="style2">
            <td colspan="8" align="center"><strong>' . $row['Вид договора'] . '</strong></td>
            </tr>
            ';
        $show = 1;
      }
      echo ' <tr>
            <td width="30" align="center">';
      if (isset($_SESSION['id_client']))  echo '<a href="/read.php">';
      else  echo '<a href="/read.php">';
      echo '
        <img src="img/logo2.png" alt="загрузить" width="50" height="50" border="0"/></a></td>
            <td align="center">' . $row['Номер_договора'] . '</td>
            <td align="left">' . $row['Вид договора'] . '</td>
            <td align="center">' . $row['Сумма_договора'] . '</td>
            <td align="left">' . $row['Контрагент'] . '</td>
            <td align="center">' . $row['ФИО'] . '</td>
        </tr>';
    }
    echo "</table>";
  }
  ?>
  <p>&nbsp;</p>
  <p>&nbsp;</p>

</body>

</html>
<?php include("common/bottom.php"); ?>