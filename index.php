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
  <div class="body__wrapper">
      <header class="header">
        <div class="container flex header__container">
          <h1 class="header__title">Simple.Link</h1>
          <strong class="header__slogan">Сервис сокращения ссылок</strong>
        </div>
      </header>

      <main class="main">
        <div class="short">
          <div class="container short__container flex">
            <div class="short__alert">
              <strong>Запрос успешно выполнен</strong>
            </div>
            <form action="https://jsonplaceholder.typicode.com/posts" method="POST" class="form flex short__form">
              <input type="text" name="url" class="input form__input" placeholder="Введите URL-адрес">
              <button type="submit" class="btn btn-reset form__btn">Сократить</button>
            </form>
            <div class="short__print flex">
              <input type="text" name="short" class="input short__input" readonly>
              <button class="btn btn-reset short__btn">Копировать</button>
            </div>
          </div>
        </section>
      </main>

      <!-- <footer class="footer"></footer> -->
  </div>
</body>

</html>
