window.onload = function () {
  console.log("Страница загружена");
  window.alert = $("#alert").clone();
  window.print = $('#print').clone();
  console.log(window.alert);
  console.log(window.print);
  $("#alert").remove();
  $("#print").remove();
}

function getShortLink() {
  // var form = document.getElementById('form');
  // var form_data = new FormData(form);

  var form_data = $('#form').serialize();

  // alert(form_data.get('url'));
  $.ajax({
    url: 'main/short.php',
    type: 'post',
    data: form_data,
    success: function(result) {
      console.log(JSON.stringify(result));
      // Если количество ключей в объекте больше 0...
      if (Object.keys(result).length) {
        // Парсим обратно в массив
        var arResult = jQuery.parseJSON(result);
        // Получаем наш алерт и инпут для копирования сокращенной ссылки...
        $('.short__wrapper').prepend(window.alert);
        var alert = $("#alert");
        var message = $("#message");
        // Выводим сообщение на экран
        alert.removeClass("alert_success alert_error");
        if ("error" in arResult) {
          message.html(arResult["error"]);
          alert.addClass("alert_error");
        } else if ("success" in arResult) {
          $('.short__wrapper').append(window.print);
          var copy = $("#copy");
          message.html(arResult["success"]);
          alert.addClass("alert_success");
          copy.val(arResult["short"]);
        }
        // this.alert.removeClass("hidden");
        // this.print.removeClass("hidden");
      }
    },
    error: function(xhr, str) {
      console.log(xhr.responseCode);
    }
  });
}

function copyLink(field) {
  // Выделяем текст внутри поля
  $(field).select();
  // Выполняем команду копирования
  document.execCommand("copy");
  // Отменение всех выделений
  document.getSelection().removeAllRanges();

  // Установка сообщения в алерт
  var alert = $("#alert");
  var message = $("#message");
  alert.removeClass("alert_error");
  alert.addClass("alert_success");
  message.html("Ссылка скопирована");
}
