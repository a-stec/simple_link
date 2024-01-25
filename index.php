<?php
  ini_set('display_errors', 0);
  ini_set('display_startup_errors', 0);
  error_reporting(E_ALL);
  @require_once ("init/connect.php");
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple.Link</title>
  <link rel="stylesheet" href="./assets/css/normalize.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="./assets/js/script.js"></script>
</head>

<body class="body">
  <div class="body__wrapper">
      <header class="header">
        <div class="container flex header__container">
          <h1 class="header__title">Simple.Link</h1>
          <strong class="header__slogan">Сервис сокращения ссылок</strong>
        </div>
      </header>

      <main class="main">
        <div class="short">
          <div class="container">
            <div class="short__wrapper flex">
              <div id="alert" class="short__alert alert alert_success">
                <strong id="message" class="alert__text">Запрос успешно выполнен</strong>
              </div>
              <form action="" method="POST" id="form" class="form flex short__form">
                <input type="url" name="url" class="input form__input short__input short__input_effects" placeholder="Введите URL-адрес">
                <button type="button" class="btn btn-reset form__btn short__btn short__btn_effects" onclick="getShortLink()">Сократить</button>
              </form>
              <div id="print" class="short__print flex">
                <input id="copy" type="url" name="short" class="input short__input short__input_effects" readonly>
                <button class="btn btn-reset short__btn short__btn_effects">Копировать</button>
              </div>
            </div>
          </div>
        </section>
      </main>

      <!-- <footer class="footer"></footer> -->
  </div>
</body>

</html>
