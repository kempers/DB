<?php
 /*
Подключение к базе данных
 */

 //Ключ защиты
 if(!defined('KEY'))
 {
     header("HTTP/1.1 404 Not Found");
     exit(file_get_contents('./../404.html'));
 }

//Подключение к базе данных mySQL с помощью PDO
try {
    $db = new PDO('mysql:host=localhost;dbname='.DATABASE, DBUSER, DBPASSWORD, array(
    	PDO::ATTR_PERSISTENT => true
    	));

} catch (PDOException $e) {
    print "Ошибка соединеия!: " . $e->getMessage() . "<br/>";
    die();
}

