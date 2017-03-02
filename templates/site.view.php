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
	<title>Каталог товаров</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<a class="cash" href="controller.php?operation=order"><h2>Моя корзина</h2></a>
   <?php 
	if (isset($_GET['id']))
	{
		echo "<a href=\"controller.php?operation=site\"><h2>Назад</h2></a>";
	}
   ?>
  <div>
	<?php foreach ($categories as $key => $cat)
	{
	?>
	<div>
		<?php
		foreach ($goods as $key =>$good )
		{
			if ($good['goods_category_id'] === $cat['id']){
				echo "<a href=\"controller.php?operation=site&id={$cat['id']}\"><h1>{$cat['title']}</h1></a>";
				$id = (int) $good['id'];
				$img =NORMAL_IMG . $good['img'] . '.jpg';
				echo "<a href=\"controller.php?operation=good&id={$id}\"><h3>Наименование: {$good['goods_name']}</h3></a>";
				echo "<a href=\"controller.php?operation=good&id={$id}\"><img src=\"{$img}\"></a>";
				echo "<p>Стоимость: {$good['price']}</p>";
			}
		}
		?>
	</div>
	<?php
	}
	?>
  </div>
</body>
</html>