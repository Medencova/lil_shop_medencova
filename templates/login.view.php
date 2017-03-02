<?php
if (!defined("APP_STARTED"))
{
  die('ILLEGAL ACCESS');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Страница заказа</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<form method="post">
	<input type="text" name="username" value="" placeholder="Логин"><br/>
	<input type="password" name="password" value="" placeholder="Пароль"><br/>
	<input type="checkbox" name="remember"/>Запомнить меня<br/>
	<button>Авторизоваться</button>
</form>
<a href="controller.php?operation=register"><button>Пройти регистрацию!</button></a>
</body>
</html>