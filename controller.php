<?php

require_once "init.php";

require_once "auth.php";
require_once "db.php";

require_once "functions.php";
require_once "include/goods.php";
require_once "include/orderes.php";
require_once "controller/shop.php";


$operation = 'site';

if (isset($_GET['operation']))
{
	$operation = $_GET['operation'];
}
$action = 'goods_' . $operation;
$action();