$(document).on('ajaxComplete ready', function () {

    // Initialize tag inputs.
    $('input[data-provides="anomaly.field_type.tags"]').each(function () {

        var config = {};

        var source = $(this).data('source');
        var options = $(this).data('options');

        if (source || options) {

            config.typeahead = {
                minLength: 0,
                displayText: function (item) {
                    return item;
                },
                source: options ? options.split(',') : source
            };

            config.freeInput = $(this).data('free_input')
        }

        $(this).tagsinput(config);
    });
});
