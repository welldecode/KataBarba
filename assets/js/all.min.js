AOS.init({
  once: true,
  duration: 800,
});
var swiper = new Swiper(".depoiments_slide", {
  slidesPerView: 3,
  spaceBetween: 30,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints: {
    300: {
      slidesPerView: 1,
    },
    640: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});
var swiper = new Swiper(".depoiments_cart_slide", {
  slidesPerView: 1,

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

$(".cart_button").on("click touchstart", function (e) {
  e.preventDefault();
  $(".cart_block_content").addClass("active");

  item_cart();
});
$(".close-cart").on("click touchstart", function (e) {
  e.preventDefault();
  $(".cart_block_content").removeClass("active");
});

let toggles = document.getElementsByClassName("faq-toggle");
let contentDiv = document.getElementsByClassName("faq-description");
let icons = document.getElementsByClassName("faq-icon");

for (let i = 0; i < toggles.length; i++) {
  toggles[i].addEventListener("click", () => {
    if (parseInt(contentDiv[i].style.height) != contentDiv[i].scrollHeight) {
      contentDiv[i].style.height = contentDiv[i].scrollHeight + "px";
      contentDiv[i].style.marginBottom = "22px";
      icons[i].classList.add("active");
    } else {
      contentDiv[i].style.height = "0px";
      contentDiv[i].style.marginBottom = "0px";
      icons[i].classList.remove("active");
    }
    for (let j = 0; j < contentDiv.length; j++) {
      if (j !== i) {
        contentDiv[j].style.height = "0px";
        contentDiv[j].style.marginBottom = "0";
        icons[j].classList.remove("active");
      }
    }
  });
}

document.onreadystatechange = function () {
  let lastScrollPosition = 0;
  const navbar = document.querySelector(".cart_container");
  window.addEventListener("scroll", function (e) {
    lastScrollPosition = window.scrollY;

    if (lastScrollPosition > 100) {
      navbar.classList.add("cart_scroll");
    } else {
      navbar.classList.remove("cart_scroll");
    }
    if (document.querySelector(".cart_footer") > 250) {
      navbar.classList.remove("cart_scroll");
    }
  });
};
const $menuBtn = document.querySelector(".menu-btn");
let isMenuOpen = false;
$menuBtn.addEventListener("click", () => {
  if (!isMenuOpen) {
    $menuBtn.classList.add("open");
    document.querySelector(".nav_menu").classList.add("open");
  } else {
    $menuBtn.classList.remove("open");
    document.querySelector(".nav_menu").classList.remove("open");
  }

  isMenuOpen = !isMenuOpen;
});

$(window).scroll(function () {
  var scrollTop = $("html, body").scrollTop();
  if (scrollTop >= $(".faq").offset().top) {
    console.log('achou')
    $(".cart_content form").css("position", "relative");
    $('.footer_minicart').css('display', 'block');
    $(".top_cart").css("display", "none");
  } else {
    console.log('n achou') 
    $('.footer_minicart').css('display', 'none');
    $(".top_cart").css("display", "block");
    $(".top_cart form").css("position", "fixed");
  }
});
const cursor = document.querySelector('.cursor');
const cursorInner = document.querySelector('.cursor-move-inner');
const cursorOuter = document.querySelector('.cursor-move-outer');

const trigger = document.querySelectorAll('a');

let mouseX = 0;
let mouseY = 0;
let mouseA = 0;

let innerX = 0;
let innerY = 0;

let outerX = 0;
let outerY = 0;

let loop = null;

document.addEventListener('mousemove', (e) => {
  mouseX = e.clientX;
  mouseY = e.clientY;
  
  if (!loop) {
    loop = window.requestAnimationFrame(render);
  }
});

for (let i = 0; i < trigger.length; i++) {
  trigger[i].addEventListener("mouseenter", function() {
    cursor.classList.add('cursor--hover');
  });
}

for (let i = 0; i < trigger.length; i++) {
  trigger[i].addEventListener("mouseleave", function() {
    cursor.classList.remove('cursor--hover');
  });
}

function render() {
  loop = null;
  
  innerX = lerp(innerX, mouseX, 0.25);
  innerY = lerp(innerY, mouseY, 0.25);
  
  outerX = lerp(outerX, mouseX, 0.13);
  outerY = lerp(outerY, mouseY, 0.13);
  
  const normalX = Math.min(Math.floor((Math.abs(mouseX - outerX) / outerX) * 1000) / 1000, 1);
  const normalY = Math.min(Math.floor((Math.abs(mouseY - outerY) / outerY) * 1000) / 1000, 1);
  const normal  = normalX + normalY * .5;
    
  cursorInner.style.transform = `translate3d(${innerX}px, ${innerY}px, 0)`;
  cursorOuter.style.transform = `translate3d(${outerX}px, ${outerY}px, 0)`;
  
  if (normal !== 0) {
    loop = window.requestAnimationFrame(render);
  }
}

function lerp(s, e, t) {
  return (1 - t) * s + t * e;
}