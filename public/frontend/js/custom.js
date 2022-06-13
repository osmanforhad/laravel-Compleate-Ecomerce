$(document).ready(function() {

    //calling the function for count the cart item and show inside nav cart
    loadCart();
     //calling the function for count the wishlist item and show inside nav wishlist
    loadwishlist();

    //csrf header for ajax request
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //__script for Add to Cart__//
    $('.addToCartBtn').click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.product_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },
            success: function(response) {
                swal(response.status);
                //calling the function for count the cart item and show inside nav cart
                 loadCart();
            }
        });

    });

    //js for increment btn
    $('.increment-btn').click(function(e) {
        e.preventDefault();
       var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    //js for decrement btn
    $('.decrement-btn').click(function(e) {
        e.preventDefault();
        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    //js for delete item from cart
    $('.delete-cart-item').click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.product_id').val();

        $.ajax({
            method: "POST",
            url: "/delete-cart-item",
            data: {
                'product_id': product_id,
            },
            success: function(response) {
                window.location.reload();
                swal("", response.status, "success");
            }
        });
    });

    //js for change item Quantity in cart area
    $('.changeQuantity').click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.product_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();
        data = {
            'product_id' : product_id,
            'product_qty' : qty,
        }
        $.ajax({
            method: "POST",
            url: "/update-cart",
            data: data,
            success: function(response) {
                window.location.reload();
            }
        });
    });

       //__script for Add to Wishlist__//
       $('.addToWishlist').click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.product_id').val();

        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                'product_id': product_id,
            },
            success: function(response) {
                swal(response.status);
                //calling the function for count the wishlist item and show inside nav wishlist
                loadwishlist();
            }
        });

    });

     //js for remove item from wishlist
     $('.remove-wishlist-item').click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.product_id').val();

        $.ajax({
            method: "POST",
            url: "/remove-wishlist-item",
            data: {
                'product_id': product_id,
            },
            success: function(response) {
                window.location.reload();
                swal("", response.status, "success");
            }
        });
    });

    //function for count cart item
    function loadCart(){
        $.ajax({
            method: "GET",
            url: "/load-cart-count",
            success: function(response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.cartCount);
            }
        });
    }

    //function for count wishlist item
    function loadwishlist(){
        $.ajax({
            method: "GET",
            url: "/load-wishlist-count",
            success: function(response) {
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.wishlistCount);
            }
        });
    }


});
