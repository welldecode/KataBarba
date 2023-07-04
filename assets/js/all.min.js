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
