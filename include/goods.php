<?php


function get_goods()
{
	global $link;
	
	$query = "SELECT * FROM `goods` WHERE 1";

	$result = mysqli_query($link, $query);

	while ($row = mysqli_fetch_assoc($result))
	{
		$goods[] = $row;
	}
	return $goods;
}

function get_categories()
{
	global $link;
	
	$query_cat = "SELECT * FROM `goods_category` WHERE 1 ";

	$result_cat = mysqli_query($link, $query_cat);

	while ($row = mysqli_fetch_assoc($result_cat))
	{
		$categories[] = $row;
	}
	return $categories;
}
function get_category_by_id($id)
{
	global $link;
	
	$query_cat = "SELECT * FROM `goods_category` WHERE `id` = '{$id}' ";

	$result_cat = mysqli_query($link, $query_cat);

	if ($row = mysqli_fetch_assoc($result_cat))
	{
		$categories[] = $row;
	}
	return $categories;
}
function get_goods_by_category_id($id)
{
	global $link;
	$query = "SELECT * FROM `goods` WHERE `goods_category_id` = '{$id}'";

	$result = mysqli_query($link, $query);

	while ($row = mysqli_fetch_assoc($result))
	{
		$goods[] = $row;
	}
	return $goods;
}
function get_goods_by_id($id)
{
	global $link;
	$query = "SELECT * FROM `goods` WHERE `id` = '{$id}'";

	$result = mysqli_query($link, $query);

	if ($row = mysqli_fetch_assoc($result))
	{
		$goods[] = $row;
	}
	return $goods;
}
function get_category_id_by_good($array)
{
	foreach ($array as $key => $good)
{
	return $cat_id = $good['goods_category_id'];
}
}