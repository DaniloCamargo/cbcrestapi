window.onload = function() {
    carregarClubes();
    getClubes();
}

function carregarClubes() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('tabela-clubes').innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', 'listar.php', true);
    xhr.send();
}

function getClubes() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('get-clubes').innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', 'getclubes.php', true);
    xhr.send();
}

$(document).ready(function () {
  $("#consumir").submit(function (event) {
    var formData = {
      clube_id: $("#consumir select[name='clube_id']").val(),
      recurso_id: $("#consumir select[name='recurso_id']").val(),
      valor_consumo: $("#consumir input[name='valor_consumo']").val(),
    };

    $.ajax({
      type: "POST",
      url: "/cbcrestapi/consumir.php",
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (data) {
      $('.resp-consumir').text(JSON.stringify(data));
      carregarClubes();
    });

    event.preventDefault();
  });
});