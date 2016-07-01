<?php
/*
Конфигурационный файл
*/


 //Ключ защиты
 if(!defined('KEY'))
 {
     header("HTTP/1.1 404 Not Found");
     exit(file_get_contents('./404.html'));
 }

 //Адрес базы данных
 define('DBSERVER','localhost');

 //Логин БД
 define('DBUSER','cr69874_db');

 //Пароль БД
 define('DBPASSWORD','Piton0124');

 //БД
 define('DATABASE','cr69874_db');

 //Префикс БД для пользователей
 define('DBPREFIX','bez_');

 //Таблица БД с планом
 define('DBTABLEPLAN','plans');

 //Errors
 define('ERROR_CONNECT','Немогу соеденится с БД');

 //Errors
 define('NO_DB_SELECT','БД отсутствует на сервере');

 //Адрес хоста сайта
 define('HOST','http://'. $_SERVER['HTTP_HOST'] .'/');
 ?>