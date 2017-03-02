<?php
session_start();

  
require_once "functions.php";



$username = null;
$password = null;

if (isset($_SESSION['username']) && isset($_SESSION['password']))
{
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
}
else
{
	if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) 
	{
		$_SESSION['username'] = $_COOKIE['username'];
		$_SESSION['password'] = $_COOKIE['password'];
		
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
	}
	else
	{
		if (($_SERVER['REQUEST_URI'] !== '/controller.php?operation=login') && ($_SERVER['REQUEST_URI'] !== '/controller.php?operation=register'))
		{
			header("Location: /controller.php?operation=login");
			die();
		}
	}
}
if ($username !== null)
{
	if (!check_auth ($username, $password, true))
	{
		logout();
		header("Location: /controller.php?operation=login");
		die();
	}
}