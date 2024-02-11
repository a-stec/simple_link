<?php
require_once('connect.php');

if (!empty($_GET["key"])) {
  $key = mysqli_real_escape_string($dbConn, trim($_GET["key"]));
  $select = mysqli_query($dbConn, "SELECT * FROM `short_link` WHERE `token` = '".$key."'");
  if (mysqli_num_rows($select)) {
    $row = mysqli_fetch_assoc($select);
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $row["url"]);
  }
}
