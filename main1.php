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

/*Подключаем шаблон HTML*/
include './html/index.html';


/*Определяем переменную для переключателя*/
$user = isset($_SESSION['user']) ? $_SESSION['user'] : false;

/*Определяем улсовие для доступа к содержимому*/
if($user === false){
  echo '<center><h3>Доступ закрыт, Вы не вошли в систему!</h3></center>'."\n";
 }
else{
  echo '

<html xmlns="http://www.w3.org/1999/xhtml">
 
<head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
 
    <title>Управление базой данных</title>
 
<link href="./css/style.css" rel="stylesheet" type="text/css">
 
</head>
 
<body><center>
 
<h3>Управление базой данных</h3>
 
<form action="save.php" method="post" name="form">
<table border="1" cellpadding="0" cellspacing="0">
 <tr>
  <td colspan="2" align="center"><strong>Отправка запроса</strong></td>
 </tr>
 <tr>
  <td width="150">Идентификатор Nav :</td>
  <td><input name="shop"></td>
 </tr>
 <tr>
  <td width="150">Дата :</td>
  <td><input name="dt"></td>
 </tr>
 <tr>
  <td width="150">CR :</td>
  <td><input name="cr"></td>
 </tr>
 <tr>
  <td width="150">Ч/В :</td>
  <td><input name="ipr"></td>
 </tr>
 <tr>
  <td width="150">Ср. чек :</td>
  <td><input name="avgitem"></td>
 </tr>
 <tr>
  <td colspan="2" align="center">
   <input type="submit" class="buttons" value="Отправить запрос" />
   <input type="reset" class="buttons" value="Очистить" />
  </td>
 </tr>
</table>
</form>
 
<form action="main2.php" method="post" name="delete_data">
<table>
 <tr>
  <td align="center"><input type="submit" class="buttons" value="Просмотр/Редактирование/Удаление данных" /></td>
 </tr>
</table>
</form>
 
<form action="http://cr69874.tmweb.ru/?mode=auth&exit=true" method="post" name="exit">
<table>
 <tr>
  <td align="center"><input type="submit" class="buttons" value="Выйти из базы данных" /></td>
 </tr>
</table>
</form>

</body>
</html>
';
}
?>