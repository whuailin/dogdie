$(document).on('ajaxComplete ready', function () {

    // Initialize the encrypted inputs.
    $('input[data-provides="anomaly.field_type.encrypted"]').each(function () {

        var input = $(this);
        var wrapper = input.closest('div');

        wrapper.find('[data-toggle="text"]').click(function (e) {
            
            e.preventDefault();

            $(this).find('i')
                .toggleClass('fa-toggle-on')
                .toggleClass('fa-toggle-off');

            if (input.attr('type') == 'password') {
                input.attr('type', 'text').focus();
            } else {
                input.attr('type', 'password').focus();
            }

            return false;
        });
    });
});
