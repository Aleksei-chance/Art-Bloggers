<?php

// 1. Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass= filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost', 'root', '', ''); 

$arr = [];

$pass = md5($pass."testtest");

$result = $mysql->query("SELECT * FROM `admins` WHERE `login` = '$login' AND `pass` = '$pass'");


if($result != '' and $result != null) {
	$admin = $result->fetch_assoc();
	$arr["status"] = "succes";
	$arr["id"] = $admin['id'];
	setcookie('admin', $admin['id'], time()+3600*10, "/"); 
	
} else {
	$arr["status"] = "error";
};

header('Content-type: application/json');
echo json_encode($arr);
exit();