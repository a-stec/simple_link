<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/project/simple_link/init/connect.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/project/simple_link/functions/genToken.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/project/simple_link/functions/validate.php");

$db = 'simple_links';
$tableDB = "short_link";
// Подключение к БД...
$db_selected = mysqli_select_db($dbConn, $db);
// Если существует параметр "url" и есть подключение к БД...
if (isset($_POST["url"]) && $db_selected) {
  $url = mysqli_real_escape_string($dbConn, trim($_POST["url"]));
  $arRequest = array();
  // Если значение url пустое...
  if (empty($url)) {
    $arRequest["error"] = "Пустое поле ввода";
  }
  // Если значение url не соответствует валидному значению...
  elseif (!validate_url($url)) {
    $arRequest["error"] = "Неверный формат URL";
  }
  // Если все соответствует нужным значениям...
  else {
    $selectDB = mysqli_query($dbConn, "SELECT * FROM `".$tableDB."` WHERE `url` = '".$url."'");
    $arRequest["short"] = "http://" . $_SERVER["HTTP_HOST"] . "/project/simple_link/";
    // Если запись существует...
    if (mysqli_num_rows($selectDB)) {
      $row = mysqli_fetch_assoc($selectDB);
      $arRequest["success"] = "Такой URL уже есть";
      $arRequest["short"] .= $row["token"];
    }
    // Если такой записи нет...
    else {
      $flag = false;
      while (!$flag) {
        $token = genToken(6);
        $selectDB = mysqli_query($dbConn, "SELECT * FROM `".$tableDB."` WHERE `token` = '".$token."'");
        if (!mysqli_num_rows($selectDB)) {
          $insert = mysqli_query($dbConn, "INSERT INTO `".$tableDB."` (`url`, `token`) VALUES ('".$url."', '".$token."')");
          $arRequest["success"] = "Добавлен новый URL";
          $arRequest["short"] .= $token;
          $flag = true;
          break;
        }
      }
    }
  }
  echo json_encode($arRequest);
  // var_dump($arRequest);
  return;
}
