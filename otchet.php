<?php
session_start();
include("common/func.php");
bd_connect();

?>
<html>

<head>
  <meta charset="utf-8">
  <title>Юридическая компания «TopLegalConsulting»</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="img/icon.ico" rel="shortcut icon" type="image/x-icon" />
</head>

<body style="body">
  <?php
  include("common/top.php");
  $sql = "SELECT * FROM otchet";

  $q = mysqli_query($db, $sql);
  if (mysqli_num_rows($q) > 0) {
    $row = mysqli_fetch_array($q, MYSQLI_ASSOC);
    echo ' <table width="100%" border="2" cellspacing="2" cellpadding="2">
        <tr>
		  <td width="120" align="center" bgcolor=#F0F8FF><font size=5><b>Номер_договора</b></font></td>
          <td width="300" align="center" bgcolor=#F0F8FF><font size=5><b>Вид_договора</b></font></td>
		  <td width="120" align="center" bgcolor=#F0F8FF><font size=5><b>Статус</b></font></td>
		  <td width="200" align="center" bgcolor=#F0F8FF><font size=5><b>Дата заключения</b></font></td>
		  <td width="200" align="center" bgcolor=#F0F8FF><font size=5><b>Дата окончания</b></font></td>
		  <td  width="100"align="center" bgcolor=#F0F8FF><font size=5><b>Сумма_договора</b></font></td>
		  </tr>';
    $show = 0;

    while ($row = mysqli_fetch_array($q, MYSQLI_ASSOC)) {
      echo '
		<tr>
        <td colspan="10" align="center"><strong>' . $row['type'] . '</strong></td>
        </tr>
        ';
      $show = 1;
      echo ' <tr>
           <td align="center"><font size=5>' . $row['Номер договора'] . '</font></td>
          <td align="center"><font size=5>' . $row['Вид договора'] . '</font></td>
		    <td align="center"><font size=5>' . $row['Статус'] . '</font></td>
          <td align="center"><font size=5>' . $row['Дата заключения'] . '</font></td>
		  <td align="center"><font size=5>' . $row['Дата окончания'] . '</font></td>
		  <td align="center"><font size=5>' . $row['Сумма_договора'] . '</font></td>
	 </tr>
      ';
    }
    echo "</table>";
  }
  ?>
  <br> <br>
  <center>
    <table>
      <tr class="style3u">
        <td><button onclick="window.print();" class="btn-new">Печать</button></td>
      </tr>
    </table>
    <br> <br>
    <table>
      <tr class="style3u">
        <td><a href="/"><button class="btn-new">На Главную</button></a></td>
      </tr>
    </table>
  </center>
</body>

</html>
<?php include("common/bottom.php"); ?>