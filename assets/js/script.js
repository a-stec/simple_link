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
      console.log("OK");
    },
    error: function(xhr, str) {
      console.log(xhr.responseCode);
    }
  });
}
