// On load, show last animes
$(window).on("load", function () {
  // Faz a requisicao
  item_cart();
});

const button_cart = document.querySelector(".button_cart");
button_cart.addEventListener("click", function (e) {
  e.preventDefault();
  let quantity = document.getElementById("quantity").value;
  var token = $(".cart_container").attr("data-secury");
  var form_ac = {
    token: token,
    quantity: quantity,
  };

  $.ajax({
    url: base_url + "/wp-json/v1/add_to_cart_product/",
    method: "POST",
    dataType: "JSON",
    data: form_ac,
    beforeSend: function () {
      $(".cart_content form").addClass("hidden");
    },
    success: function (response) {
      let items = response;
      $(".cart_content form").removeClass("hidden");
      $(".total_number").html(items["type"]);
      $("#total_cart").html(items["count_itens"]);

      $(".item_lists").empty().fadeIn(1500).html(item_cart());
    },
  });
  return false;
});

function item_cart() {
  var token = $(".title_block_cart").attr("data-secury");

  var request_data = {
    token: token,
  };
  $.ajax({
    url: base_url + "/wp-json/v1/list_item_cart/",
    method: "GET",
    data: request_data,
    dataType: "json",
    beforeSend: function () {
      $(".item_lists").html(
        '<div class="loading-post"><div class="loading-wrapper"><div class="sk-chase"><div class="sk-chase-dot"></div><div class="sk-chase-dot"></div><div class="sk-chase-dot"></div><div class="sk-chase-dot"></div><div class="sk-chase-dot"></div></div><div class="sk-chase-2"><div class="sk-chase-dot"></div><div class="sk-chase-dot"></div><div class="sk-chase-dot"></div><div class="sk-chase-dot"></div><div class="sk-chase-dot"></div></div></div></div>'
      );
      $(".btn_continue").hide();
      $(".cart-cupom").hide();
    },
    success: function (response) {
      let cart_items = response.cart;
      console.log(cart_items);
      // Render results

      if (!response.empty) {
        cart_items.forEach(function (item, index) {
          let texto_contexto = "";
          texto_contexto += `
          <div class="cart_block_item">
        <div class="info_item">
        <figure>
        ${item.image}
        </figure>
        <div class="info">
            <div class="info_title">
                <h2>${item.name}</h2>
                <span>${item.description}</span>
            </div>
            <div class="quantity_item">
            <div class="number_c">
                            <span class="input-number-decrement btn_number"><img src="http://localhost/wordpress/wp-content/themes/katabarba_v0.5/assets/img/icons/min.svg" alt=""></span>
                            <input class="input-number" disabled type="number" value="${item.quantity}" min="1" max="10"  id="quantity" >
                            <span class="input-number-increment  btn_number"><img src="http://localhost/wordpress/wp-content/themes/katabarba_v0.5/assets/img/icons/plus.svg" alt=""></span>
                        </div>
             
            ${item.remove_btn}
            </div>
            <div class="info_price_item">${item.price}</div>
        </div>
    </div>
</div>`;
          $(".btn_continue").show().html(`Finalizar Compra > ${item.price} BLR`); 
          $(".cart-cupom").show();
          $(".item_lists").empty().html(texto_contexto);
        });
      } else {
        $(".btn_continue").hide();
        $(".cart-cupom").hide();
        $(".item_lists").empty().html('<div class="empty_cart">Seu Carrinho está vazio!</div>');
      }
    },
  });
}
