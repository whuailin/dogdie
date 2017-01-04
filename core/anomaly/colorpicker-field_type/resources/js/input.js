$(document).on('ajaxComplete ready', function () {

    // Initialize colorpickers
    $('input[data-provides="anomaly.field_type.colorpicker"]').each(function () {

        var input = $(this);

        $(this).closest('.component').colorpicker({
            align: 'left',
            format: input.data('format'),
            colorSelectors: input.data('colors')

        });
    });
});
