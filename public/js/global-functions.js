function showCart(res) {
    document.querySelector('#cart-modal').innerHTML = res;
    $('#cart-modal').modal('show');

    if ($('.js-cart-qty').text()) {
        $('.js-cart-total').html($('.js-cart-qty').text());
        $('.js-header-cart').removeClass('is-empty');
        $('.js-modal-dialog').removeClass('is-empty');
    } else {
        $('.js-header-cart').addClass('is-empty');
        $('.js-modal-dialog').addClass('is-empty');
    }
}

function getCart() {
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function(res) {
            showCart(res);
        },
        error: function() {
            alert('Error. Try again later.');
        }
    });
}

function clearCart() {
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function(res) {
            showCart(res);
        },
        error: function() {
            alert('Error. Try again later.');
        }
    });
}