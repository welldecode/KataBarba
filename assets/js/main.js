(function () {
  window.inputNumber = function (el) {
    var min = el.attr("min") || false;
    var max = el.attr("max") || false;

    var els = {};

    els.dec = el.prev();
    els.inc = el.next();

    el.each(function () {
      init($(this));
    });

    function init(el) {
      els.dec.on("click", decrement);
      els.inc.on("click", increment);

      function decrement() {
        var value = el[0].value;
        value--;
        if (!min || value >= min) {
          el[0].value = value;
        }
      }

      function increment() {
        var value = el[0].value;
        value++;
        if (!max || value <= max) {
          el[0].value = value++;
        }
      }
    }
  };
})();

inputNumber($(".input-number"));
 

AOS.init({
  once: true,
  duration: 800,
});

for (var x of document.querySelectorAll(".splide.splide")) {
  var splide = new Splide(x, {
    type: "loop",
    perPage: 1,
    arrows: false, 
  });
  splide.mount();
  x.style.display = "inherit";
}

$(".cart_button").on("click touchstart", function (e) {
  e.preventDefault();
  $(".cart_block_content").addClass("active");
  
  item_cart();
});
$(".close-cart").on("click touchstart", function (e) {
  e.preventDefault();
  $(".cart_block_content").removeClass("active");
});


for (var x of document.querySelectorAll(".splide.depoiments_slide")) {
  var splide = new Splide(x, {
    type: "loop",
    perPage:3,
    arrows: true, 
    gap: 35,
  });
  splide.mount();
  x.style.display = "inherit";
}

let toggles = document.getElementsByClassName('faq-toggle');
let contentDiv = document.getElementsByClassName('faq-description');
let icons = document.getElementsByClassName('faq-icon');

for (let i = 0; i < toggles.length; i++) {
    toggles[i].addEventListener('click', () => {
        if (parseInt(contentDiv[i].style.height) != contentDiv[i].scrollHeight) {
            contentDiv[i].style.height = contentDiv[i].scrollHeight + "px";
            contentDiv[i].style.marginBottom = "22px";
            icons[i].classList.add('active');
        } else {
            contentDiv[i].style.height = "0px";
            contentDiv[i].style.marginBottom = "0px";
            icons[i].classList.remove('active');
        }
        for (let j = 0; j < contentDiv.length; j++) {
            if (j !== i) {
                contentDiv[j].style.height = "0px";
                contentDiv[j].style.marginBottom = "0";
                icons[j].classList.remove('active');
            }
        }
    });
}
