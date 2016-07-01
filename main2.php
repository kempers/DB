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
  
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
 
<head>



    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1251\" />
 
    <title>Информационная база для рассылки показателей работы магазинов</title>
 
<style type=\"text/css\">
<!--
body { font: 12px Georgia; color: #666666; }
h3 { font-size: 16px; text-align: center; }
table { width: 700px; border-collapse: collapse; margin: 0px auto; background: #E6E6E6; }
td { padding: 3px; text-align: center; vertical-align: middle; }
.buttons { width: auto; border: double 1px #666666; background: #D6D6D6; }
-->
</style>

</head>
 
<body>
 <center>
<h3>Информационная база для рассылки показателей работы магазинов</h3>

<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">
 <tr style=\"border: solid 1px #000\">
  <td><b>#</b></td>
  <td align=\"center\"><b>Идентификатор Nav</b></td>
  <td align=\"center\"><b>Первый день месяца</b></td>
  <td align=\"center\"><b>CR</b></td>
  <td align=\"center\"><b>Ч/В</b></td>
  <td align=\"center\"><b>Ср. Чек</b></td>
  <td align=\"center\"><b>Edit</b></td>
  <td align=\"center\"><b>Delete</b></td>
   </tr>
   </center>
  </body>
</html>
';
}

/* Цикл вывода данных из базы конкретных полей */


$res = $db->query('SELECT id, shop, dt, cr, ipr, avgitem FROM `' .DBTABLEPLAN .'`');
while ($row = $res->fetch()){
    echo "<tr>\n";
    echo "<td>".$row['id']."</td>\n";
    echo "<td>".$row['shop']."</td>\n";
    echo "<td>".$row['dt']."</td>\n";
    echo "<td>".$row['cr']."</td>\n";
    echo "<td>".$row['ipr']."</td>\n";
    echo "<td>".$row['avgitem']."</td>\n";
    echo "<td><a name=\"edit\" href=\"update.php?edit=".$row["id"]."\">Редактировать</a></td>\n";
    echo "<td><a name =\"del\" href=\"delete1.php?id=".$row["id"]."\">Удалить</a></td>\n";
    echo "</tr>\n";
}
 
echo ("</table>\n");

?>