<?php
// Функция генерации токена
function genToken($len=5) {
  $chars = str_split('abcdefghijklmnopqrstuvwxyzABCDFEGHIJKLMNOPRSTUVWXYZ0123456789');
  $token = '';

  for ($i = 0; $i < $len; $i++) {
    $token .= $chars[mt_rand(0, count($chars) - 1)];
  }

  return $token;
}

// echo "<h1>".genToken()."</h1>";
