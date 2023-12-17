<?php
$dir = $_SERVER['DOCUMENT_ROOT'] . '/project/simple_link/logs';
if (!is_dir($dir)) {
  mkdir($dir, 0777, true);
}
file_put_contents($dir . '/error.log', '');

$host = 'localhost';
$login = 'root';
$passwd = '';
$db = 'phpmyadmin';

$dbConn = mysqli_connect($host, $login, $passwd) or die("<h1>"."Ошибка подключения к БД: \n" . mysqli_connect_error()."</h1>");

$db_selected = mysqli_select_db($dbConn, $db);
if (!$db_selected)
{
  $log = date('Y-m-d H:i:s') . ' ' . mysqli_errno($dbConn).':'.mysqli_error($dbConn);
  file_put_contents($dir . '/error.log', $log . PHP_EOL, FILE_APPEND);
}

$resource = mysqli_query($dbConn, "SELECT * FROM `pma__userconfig`");
if  (!$resource)
{
  $log = date('Y-m-d H:i:s') . ' ' . mysqli_errno($dbConn).':'.mysqli_error($dbConn);
  file_put_contents($dir . '/error.log', $log . PHP_EOL, FILE_APPEND);
}

// MYSQLI_NUM - индексируемый массив
// MYSQLI_ASSOC - ассоциативный массив
// MYSQLI_BOTH - оба массива
while ($row = mysqli_fetch_array($resource, MYSQLI_ASSOC))
{
  // print_r($row); // 1
  // echo $row[0].':'.$row[1].':'.$row[2].':'.$row[3].'</br>'; // 2
  $config_data = json_decode($row['config_data'], true);
  echo $row['username'].':'.$row['timevalue'].':'.$config_data['lang'].'<br>'; // 3
}



