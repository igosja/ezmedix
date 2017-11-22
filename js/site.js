jQuery(document).ready(function ($) {
    $('#language-select').on('selectmenuselect', function () {
        $(this).parent().submit();
    });

    $('.load-more').on('click', function () {
        var button = $(this);
        var filter = button.data('filter');
        var get_id = button.data('id');
        var item_div = $('.item-div');
        var offset = button.data('offset');
        var type = button.data('type');

        $.ajax({
            beforeSend: function () {
                button.hide();
            },
            url: '/' + type + '/more?offset=' + offset + '&id=' + get_id + '&filter=' + filter,
            success: function (data) {
                item_div.append(data);
                $.ajax({
                    dataType: 'json',
                    url: '/' + type + '/check?offset=' + offset + '&id=' + get_id + '&filter=' + filter,
                    success: function (data) {
                        if (true === data.remove) {
                            button.remove();
                        } else {
                            button.data('offset', data.offset);
                            button.show();
                        }
                    }
                });
            }
        });
    });

    $('.submit-link').on('click', function () {
        $(this).parent().find('input').trigger('click');
    });

    var error_messages = $('.errorMessage');
    for (var i = 0; i < error_messages.length; i++) {
        if ('' !== $(error_messages[i]).html()) {
            var form_id = $(error_messages[i]).closest('form').attr('id');
            if ('popup-contact-form' === form_id) {
                $('.footer-btn').trigger('click');
                break;
            }
        }
    }

    $('.reg__add_file').on('click', function () {
        $('#upload-file').trigger('click');
    });

    $('#upload-file').on('change', function () {
        var file_html;
        var file_list = $(this).prop('files');
        for (var i = 0; i < file_list.length; i++) {
            file_html = file_html +
                '<div class="reg__files">' +
                '<a href="javascript:">' + file_list[i].name + '</a>' +
                '<a href="javascript:" class="reg__files__del" data-file="' + i + '"></a>' +
                '</div>';
        }
        $(this).after(file_html);
        $('#upload-file-remove').val('');
    });

    $(document).on('click', '.reg__files__del', function () {
        var upload_file_remove = $('#upload-file-remove');
        upload_file_remove.val(upload_file_remove.val() + ',' + $(this).data('file'));
        $(this).parent().remove();
    });

    $('.checkboxes input').on('change', function () {
        $(this).closest('form').submit();
    });

    $('.plus').on('click', function () {
        var input_value = $(this).parent().find('.score').val();
        input_value = parseInt(input_value);
        input_value--;
        $(this).parent().find('.score').val(input_value).trigger('change');
    });

    $('.minus').on('click', function () {
        var input_value = $(this).parent().find('.score').val();
        input_value = parseInt(input_value);
        input_value++;
        $(this).parent().find('.score').val(input_value).trigger('change');
    });

    $('.score').on('change', function () {
        var input_value = $(this).val();
        var input_price = $(this).data('price');
        input_value = parseInt(input_value);
        input_price = parseFloat(input_price);
        if (input_value < 1 || isNaN(input_value)) {
            input_value = 1;
            $(this).val(input_value);
        }
        $(this).parent().parent().find('.td-total').html((input_price * input_value).toFixed(2) + ' грн');
    });

    $('.add-to-cart').on('click', function () {
        var input_element = $(this).parent().parent().find('.score');
        var product_id = input_element.data('product');
        var quantity = input_element.val();
        $.ajax({
            data: {product_id: product_id, quantity: quantity},
            dataType: 'json',
            method: 'get',
            url: '/cart/add',
            success: function (data) {
                if ('success' === data.status) {
                    $('.cart-total-price').html(data.price + ' грн');
                    $('.cart-total-count').html(data.count + ' тов');
                }
            }
        })
    });

    $('.to-order').on('click', function () {
        $('html,body').animate({scrollTop: $('.lk-form').offset().top}, 'slow');
    });
});