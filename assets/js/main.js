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

cart_content = document.querySelector(".cart_content");

let cart_item = cart_content.getBoundingClientRect().top;

window.addEventListener("scroll", (e) => {
  let scrollPos = window.scrollY;
  if (scrollPos > cart_item) {
    cart_content.classList.add("sticky");
  } else {
    cart_content.classList.remove("sticky");
  }
});

AOS.init({
  once: true,
  duration: 800,
});

for (var x of document.querySelectorAll(".splide.splide")) {
  var splide = new Splide(x, {
    type: "loop",
    perPage: 1, 
    arrows: false,
    autoplay: true,
    interval: 5000,
    rewind: true,
  });
  splide.mount();
  x.style.display = "inherit";
}
 
$(".cart_button").on("click touchstart", function (e) {
  e.preventDefault();
  $('.cart_block_content').addClass("active"); 
});
$(".close-cart").on("click touchstart", function (e) {
  e.preventDefault();
  $('.cart_block_content').removeClass("active"); 
});
