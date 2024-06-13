<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Юридическая компания «TopLegalConsulting»</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="css/main.css" rel="stylesheet" type="text/css" media="screen">
	<link href="img/icon.ico" rel="shortcut icon" type="image/x-icon" />
</head>

<body>
	<table width="100%" height="100%" border="1" cellpadding="5" cellspacing="3">
		<tr>
			<td colspan="2" class="style7" align="center" bgcolor=#F0F8FF>
				<header class="part1">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-4">
								<a href="#" class="logo"><img src="img/hotpng.png" alt="Лого"></a>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-4">
								<div class="phone">
									<p class="nphone">
										<img src="img/call.png" width=50 height=50>&nbsp;&nbsp;+7 (3452) 500-045
									</p>
									<p class="time">
										<img src="img/time.png" width=50 height=50>&nbsp;&nbsp;9.00 - 20.00
									</p>
								</div>
							</div>
						</div>
					</div>
				</header>
				<nav class="part2">
					<div class="container">
						<div class="row">
							<div class="col-md-14 col-xs-14">
								<ul class="navigation">
									<li>
										<a href="/">Главная</a>
									</li>
									<li>
										<a href="/about.php">О нас</a>
									</li>
									<li>
										<a href="/aboutdogovor.php">Услуги</a>
									</li>
									<li>
										<a href="/otchet.php">Договора</a>
									</li>
									<li>
										<a href="/read.php">Помощь</a>
									</li>
									<li>
										<a href="/news.php">Новости</a>
									</li>
									<li>
										<a href="/contacts.php">Контакты</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</nav>
				<span>
					<div style="color: Navy; font-size: 40px;font-weight: bold;">
						Юридическая компания <br>«TopLegalConsulting»</div>
				</span>
			</td>
		</tr>
		<tr class="style8">
			<td valign="top" width="20%">
				
				<table width="100%" border="0" cellspacing="0" cellpadding="2">
					<tr class="style8">
						<strong class="style2">
							<td style="padding:5px 0px 5px 5px; color:#2f2f2fe8;">Категории договоров:<br>
						</strong>
						<table width="100%" border="0" cellspaing="0" cellpadding="2">
							<?php
							$sql = "SELECT * FROM `vid_dogovora` WHERE 1";
							$q_types = $db->query($sql);
							while ($row_types = mysqli_fetch_array($q_types, MYSQLI_NUM)) {
								echo '
									<tr>
										<td align="left" ><p style="margin-left: 0px"><span class="style5">
											- <a href="/?vid=catalog&type=' . $row_types[0] . '">' . $row_types[1] . '</a>
										</span></p></td>
									</tr>';
							}
							?>
						</table>
			</td>
		</tr>
		<tr>
			<td><br>
				<hr>
				<strong class="style8">
					<?php

					if (isset($_SESSION['name_client'])) echo "Здравствуйте, " . $_SESSION['name_client'] . "! <br> <a href='/reg.php?exit=1'> Выход</a>";
					else
						echo '
			<form method="get" action="/reg.php" style = "padding:10px;">
            
            <div style="width:100%; color:#2f2f2fe8;">
            <p>Гость. Авторизация:</p>

				<div style = "display:flex;" padding: 5px 0px 5px 0px;>
					<span style = "width:10%; min-width:70px;"> e-mail:</span>
					<input name="mail" type="text" size="30" maxlength="50" style="width:85%;"/>
				</div>
				<div style = "display:flex; padding: 5px 0px 5px 0px;">
					<span style = "width:10%; min-width:70px;"> пароль: </span>
					<input name="pas" type="password" size="20" maxlength="20" style="width:85%;" />
				</div>

				<div style = "padding: 5px; display: flex; justify-content: center;">
					<input class="btn-new" name="enter" type="submit" value="Войти" style = "width:50%"/>
				</div>
					<a href="/reg.php" style = "font-size:13px;">Если у вас еще нет аккаунта, зарегистрируйтесь</a>
				
			</div>
			</form></strong>';
					?>
			</td>
		</tr>
		<tr>

		</tr>
	</table>
	</td>
	<td valign="top">