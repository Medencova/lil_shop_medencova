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
<a href="controller.php?operation=site">Главная страница</a>
<h1>Ваш заказ:</h1>
<?php 
if (!$order_array)
{
	echo "<h2>Ваша корзина пуста</h2>";
	die();
}
foreach ($order_array as $key => $value)
{
	$id = $value['goods_id'];
	$amount = $value['amount'];	
	if ((int)$amount === 0)
	{
		continue;
	}
	if ($result = get_good_from_order_by_id($id))
	{
		if ($row = mysqli_fetch_assoc($result))
		{
			$price_all += $row['price'] * $amount;
			?>
			<form method="post">
			<input type="hidden" name="delete_one" value="<?=$id?>">
			<h4><?=$row['goods_name'] . ". Цена: " . $row['price'] . "руб. В количестве: " . $amount . " штук." ?></h4>
			<button>Убрать единицу товара</button>
			</form>
			<?php 
		}		
	}
}
?>
<h4>Итого: <?=$price_all?> руб.</h4>
<form method="post">
<input type="hidden" name="order" value="clean">
<button>Очистить заказ</button>
</form>
<form method="post">
<input type="hidden" name="order" value="done">
<button>Оформить заказ</button>
</form>
</body>
</html>