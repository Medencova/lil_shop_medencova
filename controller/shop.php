<?php
require_once "auth.php";

function goods_site()
{
	global $username;
	$goods = array();
	$categories = array();
	if ($username === null)
	{
		header ("Location: controller.php?operation=register");
		die();
	} 
	//вывод на страницу категорий и товаров
	if (!isset($_GET['id']))
	{
		$goods = get_goods();
		$categories = get_categories();
	}
	else 
	{	$id_cat = (int)$_GET['id'];
		$categories = get_category_by_id($id_cat);
		$goods = get_goods_by_category_id($id_cat);
	}
	require_once "templates/site.view.php";
}
function goods_good()
{
	global $username;
	if ($username === null)
	{
		header ("Location: controller.php?operation=register");
		die();
	} 

	$id = isset($_GET['id'])? $_GET['id']: NULL;
	if ($id === NULL)
	{
		echo "404";
		die();
	}

	//вывод информации о товаре
	$goods = get_goods_by_id($id);
	$cat_id = get_category_id_by_good($goods);


	//вывод информации о категории товара
	$categories = get_category_by_id($cat_id);

	require_once "templates/good.view.php";
}
function goods_order()
{
	global $username;
	$goods_id = null;
	$user_id = null;
	$amount = 1;
	$goods_array = array();
	$order_array = array();
	$price_all = null;
	$user_id = get_user_id_by_username($username);


	if ($username === null)
	{
		header ("Location: controller.php?operation=register");
		die();
	} 

	if (isset($_POST['buy']))
	{
		$goods_id = (int)$_POST['buy'];
		
		
		if ($result = get_good_from_order($user_id, $goods_id))
		{
			if (!($row = mysqli_fetch_assoc($result)))
			{
				add_new_order($goods_id, $user_id, $amount);
				header("Location: controller.php?operation=order");
				die();
			}
			else
			{
				up_ammount_by_buy($user_id, $goods_id);
				header("Location: controller.php?operation=order");
				die();
			}
		}	
	}
	$order_array = get_order_by_user_id($user_id);
	if (isset($_POST['delete_one']))
	{
		$goods_id = (int) $_POST['delete_one'];
		if (delete_one_number_of_good($user_id, $goods_id))
		{
			header ("Location: controller.php?operation=order");
			die();
		}
		
	}
	if (isset($_POST['order']))
	{
		
		if ($_POST['order'] === 'clean')
		{
			delete_order($user_id);
			header ("Location: controller.php?operation=order");
			die();
		}
		if ($_POST['order'] === 'done')
		{
			header("Location: controller.php?operation=site");
			die();
		}
	}
	require_once "templates/order.view.php";
}


function goods_register()
{
	global $username;
	if ($username !== null)
	{
		header ("Location: controller.php?operation=site");
		die();
	}		
	if (count ($_POST))
	{
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		
		if (register_by_username_and_password($username, $password))
		{
			header ("Location: controller.php?operation=login");
			die();
		}
	}
	require_once "templates/register.view.php";
}

function goods_login()
{	
	if ( count($_POST))
	{
		if (check_auth($_POST['username'], $_POST['password']))
		{
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['password'] = md5($_POST['password']);
			if (isset($_POST['remember']))
			{
				setcookie("username", $_POST['username'], time() + 60 * 60 * 24 * 365);
				setcookie("password", md5($_POST['password']), time() + 60 * 60 * 24 * 365);
			}
			header ("Location: controller.php?operation=site");
			die();
		}
		else
		{
			echo "Неверные логин и пароль. Попробуйте заново или пройдите регистрацию.";
			?>
			<a href="controller.php?operation=register"><p>Регистрация</p></a>
			<?php
		}
	}
	require_once "templates/login.view.php";
}
function goods_logout()
{
	if (count(S_POST))
	{
		logout();
		header ("Location: controller.php?operation=login");
		die();
	}
	header ("Location: controller.php?operation=site.");
}