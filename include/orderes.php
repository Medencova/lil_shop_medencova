<?php


function get_user_id_by_username($name)
{
	global $link;
	$query = "SELECT `id` FROM `users` WHERE `user_name`='$name'";
	$result = mysqli_query($link, $query);
	if ($result)
	{
		if ($row = mysqli_fetch_assoc($result))
		{
			return $user_id = (int)$row['id'];
		}
	}
}
function up_ammount_by_buy($user_id, $goods_id)
{
	global $link;
	$query = "SELECT `amount` FROM `user_order` WHERE `user_id`='$user_id' AND `goods_id`='$goods_id'";
	$result = mysqli_query($link, $query);
	if ($result)
	{
		if ($row = mysqli_fetch_assoc($result))
		{	
			
			$amount = (int)$row['amount'] + 1;
			$query_am = "UPDATE  `user_order` SET `amount` = '$amount' WHERE `user_id`='$user_id' AND `goods_id`='$goods_id'";
			$result_am = mysqli_query($link, $query_am);
		}
	}
}
function get_order_by_user_id($id)
{
	global $link;
	$order_array = array();
	$query = "SELECT * FROM `user_order` WHERE `user_id` = '$id'";
	$result = mysqli_query($link, $query);
	if ($result)
	{
		while ($row = mysqli_fetch_assoc($result))
		{
			$order_array[] = $row;
		}
	}
	if (!$order_array)
	{
		return null;
	}
	else
	return $order_array;
}
function add_new_order($goods_id, $user_id, $amount)
{
	global $link;
	$query = "INSERT INTO `user_order` VALUES ('$goods_id', '$user_id', '$amount')";
	$result = mysqli_query($link, $query);
}
function get_good_from_order_by_id($id)
{
	global $link;
	$query = "SELECT `goods_name`, `price` FROM `goods` WHERE `id`='$id'";
	return $result = mysqli_query($link, $query);
}
function get_good_from_order($user_id, $goods_id)
{
	global $link;
	$query = "SELECT * FROM `user_order` WHERE `user_id` = '$user_id' AND `goods_id`='$goods_id'";
	return $result = mysqli_query($link, $query);
}
function delete_one_number_of_good($user_id, $goods_id)
{
	global $link;
	$query = "SELECT `amount` FROM `user_order` WHERE `user_id`='$user_id' AND `goods_id`='$goods_id'";
	$result = mysqli_query($link, $query);
	if ($result)
	{
		if ($row = mysqli_fetch_assoc($result))
		{	
			
			$amount = (int)$row['amount'] - 1;
			$query_am = "UPDATE  `user_order` SET `amount` = '$amount' WHERE `user_id`='$user_id' AND `goods_id`='$goods_id'";
			return $result_am = mysqli_query($link, $query_am);
		}
	}
}
function delete_order($user_id)
{
	global $link;
	$query = "DELETE FROM `user_order` WHERE `user_id` = '$user_id' ";
	$result = mysqli_query($link, $query);
}