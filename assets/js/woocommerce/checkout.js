(function(){

	const cep = document.querySelector("input[name=billing_postcode]");
  
  cep.addEventListener('blur', e=> {
  		const value = cep.value.replace(/[^0-9]+/, '');
      const url = `https://viacep.com.br/ws/${value}/json/`;
       
      fetch(url)
      .then( response => response.json())
      .then( json => {
      		
      console.log(json)
          if( json.logradouro ) {
          	document.querySelector('input[name=billing_address_1]').value = json.logradouro;
            document.querySelector('input[name=billing_neighborhood]').value = json.bairro;
            document.querySelector('input[name=billing_city]').value = json.localidade; 
            document.querySelector('input[name=billing_state]').value = json.uf; 
          }
      
      });
      
      
  });  
})();
const tel = document.getElementById('billing_phone') // Seletor do campo de telefone

tel.addEventListener('keypress', (e) => mascaraTelefone(e.target.value)) // Dispara quando digitado no campo
tel.addEventListener('change', (e) => mascaraTelefone(e.target.value)) // Dispara quando autocompletado o campo

const mascaraTelefone = (valor) => {
    valor = valor.replace(/\D/g, "")
    valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2")
    valor = valor.replace(/(\d)(\d{4})$/, "$1-$2")
    tel.value = valor // Insere o(s) valor(es) no campo
}

const progress = document.getElementById("progress");
const prev = document.getElementById("prev");
const next = document.getElementById("next");
const cricles = document.querySelectorAll(".circle");

let currentActive = 1;

next.addEventListener("click", () => {
  if (currentActive < cricles.length) {
    currentActive++;
  }
  update();
});

prev.addEventListener("click", () => {
  if (currentActive > 1) {
    currentActive--;
  }
  update();
});

function update() {
  cricles.forEach((circle, idx) => {
    if (idx < currentActive) {
      circle.classList.add("active");
    } else {
      circle.classList.remove("active");
    }
  });
  
  if (currentActive === 1) {
    prev.disabled = true;
  } else if (currentActive === cricles.length) {
    next.disabled = true;
  } else {
    prev.disabled = false;
    next.disabled = false;
  }
}
