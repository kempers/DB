<?php
session_start();
/*Отладчик ошибок PHP*/ 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

/*Устанавливаем ключ защиты*/
define('KEY', true);
	 
/*Подключаем конфигурационный файл*/
include './config.php';

//подключаем MySQL
include './bd/bd.php';
  
  
$shop   = trim ( $_POST['shop'] );
$dt = trim ( $_POST['dt'] );
$cr = trim ( $_POST['cr'] );
$ipr = trim ( $_POST['ipr'] );
$avgitem = trim ( $_POST['avgitem'] );
$shop  = addslashes ( $shop );
$dt = addslashes ( $dt );
$cr = addslashes ( $cr );
$ipr = addslashes ( $ipr );
$avgitem = addslashes ( $avgitem );
 
// Составляем запрос для вставки информации в таблицу shop;
$sql='UPDATE WHERE `'. DBTABLEPLAN .'` SET `shop` ='{$shop}', `dt` ='{$dt}', `cr` ='{$cr}', `ipr` ='{$ipr}', `avgitem` ='{$avgitem}',  WHERE `id`={$id}';
$sth=$db->prepare($sql) or die("ERROR: ".mysql_error());
$sth->execute();


?>