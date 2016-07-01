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


$id = $_GET['id'];
pagedel($id);
header ("location: main2.php");



function pagedel($id){    // функция удаления записи
    $sql = 'DELETE FROM `'. DBTABLEPLAN .'` WHERE id=$id';
    $db->query($sql) or die (mysql_error());
}

?>