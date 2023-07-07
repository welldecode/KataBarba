// On load, show last animes
$(document).ready(function () {
  // Faz a requisicao
  item_cart();
});

const button_cart = document.querySelector(".button_cart");
button_cart.addEventListener("click", function (e) {
  e.preventDefault();
  let quantity = document.getElementById("quantity").value;
  var token = $(".cart_container").attr("data-secury");
  var form_ac = {
    action: "woocommerce_ajax_add_to_cart",
    token: token,
    quantity: quantity,
  };

  $.ajax({
    url: cart_obj.ajax_url,
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

      $(".cart_block_content").addClass("active");
      $(".item_lists").empty().fadeIn(1500).html(item_cart());
    },
  });
  return false;
});

function item_cart() {
  var request_data = {
    action: "woocommerce_ajax_get_cart",
  };
  $.ajax({
    url: cart_obj.ajax_url,
    method: "GET",
    data: request_data,
    beforeSend: function () {
      var divs = "";
      var result = range(1, 1);
      $.each(result, function (i, item) {
        divs += `<div class="card"><div class="header"><div class="img"></div><div class="details"><div class="titles"> <span class="name"></span><span class="about"></span></div><span class="price"></span></div></div></div>`;
      });
      $(".item_lists").html(divs);
      $(".btn_continue").hide();
      $(".cart-cupom").hide();
    },
    success: function (response) {
      let cart_items = response.cart;
      console.log(cart_items);
      if (!response.empty) {
        cart_items.forEach(function (item, index) {
          let texto_contexto = "";
          texto_contexto += `
          <div class="cart_block_item"><div class="info_item"><figure>${item.image}</figure><div class="info"><div class="info_title"><h2>${item.name}</h2><span>${item.description}</span></div><div class="quantity_item">${response.btn_quantity}${response.btn_remove}</div><div class="info_price_item">${item.price}</div></div></div></div>`;
          $(".btn_continue")
            .show()
            .html(`Finalizar Compra > ${item.price} BLR`);
          $(".cart-cupom").show();
          $(".item_lists").empty().html(texto_contexto);
        });
      } else {
        $(".btn_continue").hide();
        $(".cart-cupom").hide();
        $(".item_lists")
          .empty()
          .html('<div class="empty_cart">Seu Carrinho está vazio!</div>');
      }
    },
  });
}

// Range Array Jquery
function range(start, end) {
  return Array(end - start + 1)
    .fill()
    .map((_, idx) => start + idx);
}

$(document).on("click", "#apply_coupon", function (e) {
  e.preventDefault();

  var request_data = {
    action: "woocommerce_ajax_get_coupon",
    coupon_code: $("#coupon_code").val(),
  };

  $.ajax({
    url: cart_obj.ajax_url,
    method: "GET",
    data: request_data,

    success: function (e) { 
      item_cart();
      $(".msg_cart").addClass("visible").fadeIn(200);
      $(".msg_cart").html(e.msg).fadeIn(200);
      $(".remove_coupon").css("display", "block");
      setTimeout(function () {
        $(".msg_cart").removeClass("visible").fadeOut(300);
      }, 2000);
    },
  });
});

$(document).on("click", ".remove_coupon", function (e) {
  e.preventDefault();

  var request_data = {
    action: "woocommerce_ajax_remove_coupon",
    coupon_code: $("#coupon_code").val(),
  };

  $.ajax({
    url: cart_obj.ajax_url,
    method: "GET",
    data: request_data,

    success: function (e) { 
      item_cart();
      $(".msg_cart").addClass("visible").fadeIn(200);
      $(".msg_cart").html(e.msg).fadeIn(200);
      $(".remove_coupon").hide();
      $("#coupon_code").val("");
      setTimeout(function () {
        $(".msg_cart").removeClass("visible").fadeOut(300);
      }, 2000);
    },
  });
});
