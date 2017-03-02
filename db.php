<?php

if (!defined("APP_STARTED"))
  {
    die('ILLEGAL ACCESS');
  }

//маркер ошибок подключения
$connect_error = array('status' => false, 'message' => '');

//подключение и выбор БД всегда делаю отдельно, чтобы разделить контроль ошибьок, что в будущем может уменьшить
$link = mysqli_connect('127.0.0.1', 'root', '');
if (!$link)
{
	$connect_error['status'] = true;
	$connect_error['message'] = 'MySQL server connection error';
	die('нет подключения');
}
else if (!mysqli_select_db($link, 'project'))
{
	$connect_error['status'] = true;
	$connect_error['message'] = 'MySQL database selection error';
}