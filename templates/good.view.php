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
<a href="controller.php?operation=site"><h2>Главная страница</h2></a>
<a class="cash" href="controller.php?operation=order"><h2>Моя корзина</h2></a>
<?php
foreach ($goods as $key => $good)
{
	foreach ($categories as $key => $cat)
	{
		$norm_img = NORMAL_IMG . $good['img'] . '.jpg';
		$goods_id = (int) $good['id'];
		echo <<<HTML
	<h1>Категория: <a href="controller.php?operation=site&id={$cat['id']}">{$cat['title']} </h1></a>
	<h2>Наименование: {$good['goods_name']}</h2>
	<h4>Цена: {$good['price']}</h4>
	<img src="{$norm_img}">
	<p>Описание: {$good['description']}</p>
HTML;
	}
}
?>
<form method="post" action="controller.php?operation=order"  enctype="multipart/form-data">
<input type="hidden" name="buy" value="<?= $goods_id ?>" >
<button>Купить</button>
</form>
</body>
</html>