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
	<button>Зарегистрироваться</button>
</form>
<a href="controller.php?operation=login"><button>Я уже есть на сайте!</button></a>
</form>
</body>
</html>