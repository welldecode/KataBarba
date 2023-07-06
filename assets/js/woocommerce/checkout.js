var inputsCEP = $('#billing_address_1, #billing_neighborhood, #billing_city, #billing_state');
var inputsRUA = $('#billing_postcode, #billing_neighborhood');
var validacep = /^[0-9]{8}$/;

function limpa_formulário_cep(alerta) {
  if (alerta !== undefined) {
    alert(alerta);
  }

  inputsCEP.val('');
}

function get(url) {

  $.get(url, function(data) {

    if (!("erro" in data)) {

      if (Object.prototype.toString.call(data) === '[object Array]') {
        var data = data[0];
      }

      $.each(data, function(nome, info) {
        $('#' + nome).val(nome === 'billing_postcode' ? info.replace(/\D/g, '') : info).attr('info', nome === 'billing_postcode' ? info.replace(/\D/g, '') : info);
      });



    } else {
      limpa_formulário_cep("CEP não encontrado.");
    }

  });
}

// Digitando RUA/CIDADE/UF
$('#billing_address_1, #billing_city, #billing_state').on('blur', function(e) {

  if ($('#billing_address_1').val() !== '' && $('#billing_address_1').val() !== $('#billing_address_1').attr('info') && $('#billing_city').val() !== '' && $('#billing_city').val() !== $('#billing_city').attr('info') && $('#billing_state').val() !== '' && $('#billing_state').val() !== $('#billing_state').attr('info')) {

    inputsRUA.val('...');
    get('https://viacep.com.br/ws/' + $('#billing_state').val() + '/' + $('#billing_city').val() + '/' + $('#billing_address_1').val() + '/json/');
  }

});

// Digitando CEP
$('#billing_postcode').on('blur', function(e) {

  var cep = $('#billing_postcode').val().replace(/\D/g, '');

  if (cep !== "" && validacep.test(cep)) {

    inputsCEP.val('...');
    get('https://viacep.com.br/ws/' + cep + '/json/');

  } else {
    limpa_formulário_cep(cep == "" ? undefined : "Formato de CEP inválido.");
  }
});