<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/project/simple_link/init/connect.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/project/simple_link/functions/validate.php");

if (isset($_POST["url"])) {
  $url = mysqli_real_escape_string($dbConn, trim($_POST["url"]));
  $arRequest = array();
  if (empty($url)) {
    $arRequest["error"] = "Пустое поле ввода";
  } elseif (!validate_url($url)) {
    $arRequest["error"] = "Неверный формат URL";
  }

  var_dump($arRequest);
}

