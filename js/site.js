jQuery(document).ready(function ($) {
    $('#language-select').on('selectmenuselect', function () {
        $(this).parent().submit();
    });

    $('.load-more').on('click', function () {
        var button = $(this);
        var type = button.data('type');
        var offset = button.data('offset');
        var item_div = $('.item-div');

        $.ajax({
            beforeSend: function () {
                button.hide();
            },
            url: '/' + type + '/more?offset=' + offset,
            success: function (data) {
                item_div.append(data);
                $.ajax({
                    dataType: 'json',
                    url: '/' + type + '/check?offset=' + offset,
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
});