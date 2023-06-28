const button_cart = document.querySelector('.button_cart')
button_cart.addEventListener('click', function (e) {
    e.preventDefault();
    let quantity = document.getElementById('quantity').value;;
    var token = $('.cart_container').attr('data-secury')
    var form_ac = {
        token: token,
        quantity: quantity,
    };

    $.ajax({
        url: base_url  + '/wp-json/v1/add_to_cart_product/',
        method: 'POST',
        dataType: 'JSON',
        data: form_ac,
        beforeSend: function () {
             $('.cart_content form').addClass('hidden');
        },
        success: function (response) {
            let items = response; 
            $('.cart_content form').removeClass('hidden'); 
            $(".total_number").html(items['type']);
            $("#total_cart").html(items['count_itens'])
        }
    });
    return false;
});


function modal_cart() {
    let modal_l = '';
    modal_l += `
        <div class="cart_items">
        <div class="number_c">
            <div id="decrement" class="btn_number"><img src="/wp-content/themes/katabarba_v0.5/assets/img/icons/min.svg" alt=""></div>
            <input type="number" value="5" id="quantity" />
            <div id="increment" class="btn_number"><img src="/wp-content/themes/katabarba_v0.5/assets/img/icons/plus.svg" alt=""></div>
        </div>
        <div class="total_number">0</div>
        <div class="payment_content">
            <div class="buy_c button_cart" id="button_cart">
                Comprar Agora
            </div>
        </div>
    </div>`;
    $('.cart_items').html(modal_l);
}