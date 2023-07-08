(function () {
  const cep = document.querySelector("input[name=billing_postcode]");

  cep.addEventListener("blur", (e) => {
    const value = cep.value.replace(/[^0-9]+/, "");
    const url = `https://viacep.com.br/ws/${value}/json/`;

    fetch(url)
      .then((response) => response.json())
      .then((json) => {
        console.log(json);
        if (json.logradouro) {
          document.querySelector("input[name=billing_address_1]").value =
            json.logradouro;
          document.querySelector("input[name=billing_neighborhood]").value =
            json.bairro;
          document.querySelector("input[name=billing_city]").value =
            json.localidade;
        }
      });
  });
})();
const tel = document.getElementById("billing_phone"); // Seletor do campo de telefone

tel.addEventListener("keypress", (e) => mascaraTelefone(e.target.value)); // Dispara quando digitado no campo
tel.addEventListener("change", (e) => mascaraTelefone(e.target.value)); // Dispara quando autocompletado o campo

const mascaraTelefone = (valor) => {
  valor = valor.replace(/\D/g, "");
  valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2");
  valor = valor.replace(/(\d)(\d{4})$/, "$1-$2");
  tel.value = valor; // Insere o(s) valor(es) no campo
};

$(document).ready(function () {
  const input = document.querySelectorAll("#shipping_method li");
  input.forEach((val, i) => {

    const cep = val.querySelector('input[name^="shipping_method"]'); 
   
    if ($(cep).is(":checked")) {  
      const label = val.querySelector("label");
      $(".frete").html(label);  
    } else {  
      $(cep).on('change', function() {  
        console.log(cep); 
      }) 
    } 
  });
});
