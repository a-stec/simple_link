window.onload = function () {
  console.log("Страница загружена");
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
        var copy = $("#copy");
        var alert = $("#alert");
        var message = $("#message");
        // Выводим сообщение на экран
        alert.removeClass("alert_success alert_error");
        if ("error" in arResult) {
          message.html(arResult["error"]);
          alert.addClass("alert_error");
        } else if ("success" in arResult) {
          message.html(arResult["success"]);
          alert.addClass("alert_success");
          copy.val(arResult["short"]);
        }
      }
    },
    error: function(xhr, str) {
      console.log(xhr.responseCode);
    }
  });
}
