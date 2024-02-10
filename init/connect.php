<?php
$dir = $_SERVER['DOCUMENT_ROOT'] . '/logs';
if (!is_dir($dir)) {
  mkdir($dir, 0777, true);
}
file_put_contents($dir . '/error.log', '');

$host = 'localhost';
$login = 'root';
$passwd = '';
$db = 'simple_links';
// Подключение к БД
$dbConn = mysqli_connect($host, $login, $passwd) or die("<h1>"."Ошибка подключения к БД: \n" . mysqli_connect_error()."</h1>");
