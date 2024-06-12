<?php
session_start();
include("common/func.php");
bd_connect();
error_reporting(0);
?>
<html>
<head>
  <meta charset="utf-8">
  <title>Юридическая компания «TopLegalConsulting»</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="img/icon.ico" rel="shortcut icon" type="image/x-icon"/>
</head>
<body style="body">

<?
include("common/top.php");
if (isset($_GET['enter'])) 
  {
    $q_guest = mysql_query("SELECT `id_client`,`name` FROM `clients` WHERE `mail`='".$_GET['mail']."' AND `pas`='".$_GET['pas']."' limit 1");
    if (mysql_num_rows($q_guest)==1) 
      {
        $row_q_guest = mysql_fetch_array($q_guest,MYSQL_NUM);
        $_SESSION['id_client'] = $row_q_guest[0];
        $_SESSION['name_client'] = $row_q_guest[1];
      }
    Header("Location:http://toplegalconsulting.com/");
  }
elseif (isset($_POST['reg']) AND $_POST['name']!='' AND $_POST['mail']!='' AND $_POST['pas']!='' AND $_POST['address']!='' AND $_POST['phone']!='')
  {
    mysql_query("INSERT INTO `clients` VALUES ('', '".$_POST['name']."', '".$_POST['mail']."', '".$_POST['pas']."', '".$_POST['address']."', '".$_POST['phone']."', '".$_POST['comments']."')");
    Header("Location:http://toplegalconsulting.com/reg.php?enter=1&mail=".$_POST['mail']."&pas=".$_POST['pas']);
  }
elseif (isset($_GET['exit']))
  {
    unset ($_SESSION['id_client']);
    unset ($_SESSION['name_client']);
    Header("Location:http://toplegalconsulting.com/");
  } 

?>
	<hr>
     <form method="post" action="">
	   <strong class="style8">Регистрация      </strong><br>
	     <div class="style5">Фамилия И.О.*</div>
	     <INPUT style="WIDTH: 200px" NAME="name" type="text" value="">
	     <br>
	    <div class="style5"> Контактный e-mail*</div>
	     <INPUT style="WIDTH: 200px" NAME="mail" type="text" value="">
         <br><div class="style5">Пароль для входа на сайт*</div>
	     <input name="pas" type="password" size="20" maxlength="20" />
<br>
	     <div class="style5">Адрес*</div>
	     <input style="WIDTH: 500px" NAME="address" value="">
	     <br>
	     <div class="style5">Контактный телефон*</div>
	     <INPUT style="WIDTH: 200px" NAME="phone" type="text">
	     <br>
	    <div class="style5"> Комментарии</div>
	     <textarea style="WIDTH: 500px; height:70px" NAME="comments"></textarea>
	     <br> <br>
	     <i class="style4">Поля отмеченные символом * обязательны для заполнения</i>
	     <br> <br>
	     <input class="btn-new" name="reg" type="submit" value="Регистрация" />
          </p>
     </form><br>
  </body>
  </html>
<?php include("common/bottom.php");?>