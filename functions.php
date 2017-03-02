<?php
require_once "db.php";

if (!defined("APP_STARTED"))
{
    die('ILLEGAL ACCESS');
}
error_reporting(E_ALL);
ini_set('display_errors', 1);



function check_auth($login, $password, $md5 = false)
{
	global $link;
	if (!$md5) $password = md5($password);
	
	$query = "SELECT COUNT(*) FROM `users` WHERE `user_name` = '$login' AND `user_password` = '$password'";
	
	$result = mysqli_query($link, $query);
	if ($result)
	{
		if ($row = mysqli_fetch_row($result))
		{
			if ($row[0] > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return null;
		}
	}
	else
	{
		return null;
	}
}

function logout()
{
	if (count($_COOKIE))
	{
		setcookie("username", '', time()-3600);
		setcookie("password", '', time()-3600);
	}
	unset($_SESSION['username']); //уничтожение сессии
	unset($_SESSION['password']);
	session_destroy();
}


function register_by_username_and_password($username, $password)
{
	global $link;
	$query = "INSERT INTO `users` VALUES (NULL, '$username', '$password')";
	return $result = mysqli_query($link, $query);
}



