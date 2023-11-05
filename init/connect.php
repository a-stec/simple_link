<?php
$host = 'localhost';
$login = 'root';
$passwd = '';
$db = 'simple_links';

$dbConn = mysqli_connect($host, $login, $passwd, $db) or die("Ошибка подключения к БД: \n" . mysqli_connect_error());
var_dump($dbConn);
