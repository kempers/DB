<?php
session_start();
/*Отладчик ошибок PHP*/ 
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

/*Устанавливаем ключ защиты*/
define('KEY', true);
	 
/*Подключаем конфигурационный файл*/
include './config.php';

//подключаем MySQL
include './bd/bd.php';

if (empty($_POST['shop']) || empty($_POST['dt']) || empty($_POST['cr']) || empty($_POST['ipr']) || empty($_POST['avgitem']))

{
        die ("<div style=\"text-align: center; margin-top: 10px;\">
<font color=\"red\">Не все поля были заполнены!<br> Пожалуйста, вернитесь назад и заполните все поля.</font>
<br>
<a href=\"main1.php\">Вернуться назад</a></div>");
}


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
$sql='INSERT into `'. DBTABLEPLAN .'` (shop,dt,cr,ipr,avgitem) values (:shop,:dt,:cr,:ipr,:avgitem)';
$sth=$db->prepare($sql);
$sth->bindValue(':shop', $shop);
$sth->bindValue(':dt', $dt);
$sth->bindValue(':cr', $cr);
$sth->bindValue(':ipr', $ipr);
$sth->bindValue(':avgitem', $avgitem);
$sth->execute();

 
/* В случае успешного сохранения выводим сообщение и ссылку возврата */
echo ("<div style=\"text-align: center; margin-top: 10px;\">
<font color=\"green\">Данные успешно сохранены!</font>
<br>
<a href=\"main1.php\">Вернуться назад</a></div>");

?>