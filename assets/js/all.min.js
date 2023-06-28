const incrementButton = document.querySelector("#increment");
const decrementButton = document.querySelector("#decrement");
const quantityInput = document.querySelector("#quantity");

incrementButton.addEventListener("click", () => {
  quantityInput.value = parseInt(quantityInput.value) + 1;
});
decrementButton.addEventListener("click", () => {
  quantityInput.value = parseInt(quantityInput.value) - 1;
});

cart_content = document.querySelector('.cart_content')
 
let cart_item = cart_content.getBoundingClientRect().top;

window.addEventListener("scroll", e => { 
  let scrollPos = window.scrollY;
  if (scrollPos > cart_item) { 
    cart_content.classList.add('sticky'); 
  } else {
    cart_content.classList.remove('sticky'); 
  }
});