<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple.Link</title>
  <link rel="stylesheet" href="./assets/css/normalize.css">
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body class="body">
  <header class="header">
    <div class="container flex header__container">
      <h1 class="header__title">Simple.Link</h1>
      <strong class="header__slogan">Сервис сокращения ссылок</strong>
    </div>
  </header>

  <main class="main">
    <div class="container">
      <div class="alert hidden">
        <strong>Запрос успешно выполнен</strong>
      </div>
      <form action="" class="form flex main__form">
        <input type="text" class="input" placeholder="Введите URL-адрес" name="url">
        <button class="btn btn-reset form__btn">Сократить</button>
      </form>
      <div class="result">
        <input type="text" class="input" readonly>
        <button class="btn btn-reset result__btn">Копировать</button>
      </div>
    </div>
  </main>

</body>

</html>
