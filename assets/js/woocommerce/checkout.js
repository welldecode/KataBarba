(function () {
  const cep = document.querySelector("input[name=billing_postcode]");

  cep.addEventListener("blur", (e) => {
    const value = cep.value.replace(/[^0-9]+/, "");
    const url = `https://brasilapi.com.br/api/cep/v2/${value}`;

    fetch(url)
      .then((response) => response.json())
      .then((json) => {
        console.log(json);
        if (json.street) {
          document.querySelector("input[name=billing_address_1]").value =
            json.street;
          document.querySelector("input[name=billing_neighborhood]").value =
            json.neighborhood;
          document.querySelector("input[name=billing_city]").value = json.city;
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
      $(cep).on("change", function () {
        console.log(cep);
      });
    }
  });
});

$(document).ready(function () {
  var current_fs, next_fs, previous_fs; //fieldsets
  var opacity;
  var current = 1;
  var steps = $("fieldset").length;

  setProgressBar(current);

  $(".next").click(function () {
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    //Add Class Active
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate(
      { opacity: 0 },
      {
        step: function (now) {
          // for making fielset appear animation
          opacity = 1 - now;

          current_fs.css({
            display: "none",
            position: "relative",
          });
          next_fs.css({ opacity: opacity });
        },
        duration: 500,
      }
    );
    setProgressBar(++current);
  });

  $(".previous").click(function () {
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //Remove class active
    $("#progressbar li")
      .eq($("fieldset").index(current_fs))
      .removeClass("active");

    //show the previous fieldset
    previous_fs.show();

    //hide the current fieldset with style
    current_fs.animate(
      { opacity: 0 },
      {
        step: function (now) {
          // for making fielset appear animation
          opacity = 1 - now;

          current_fs.css({
            display: "none",
            position: "relative",
          });
          previous_fs.css({ opacity: opacity });
        },
        duration: 500,
      }
    );
    setProgressBar(--current);
  });

  function setProgressBar(curStep) {
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar").css("width", percent + "%");
  }

  $(".submit").click(function () {
    return false;
  });
});

$(".checkout_info_mobile_container").click(function () {
  if ($(this).hasClass('open')) {
    $(this).removeClass("open");
    $('.checkout_items').css("display", 'none'); 
    $('.checkout_info_mobile_container .arrow').removeClass("open");
  } else { 
    $(this).addClass("open");
    $('.checkout_info_mobile_container .arrow').addClass("open");
    $('.checkout_items').css("display", 'block'); 
  }
});
