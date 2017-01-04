$(function () {

    // Initialize text suggestions
    $('input[data-provides="anomaly.field_type.text"]').each(function () {

        var wrapper = $(this).closest('div');
        var counter = wrapper.find('.counter');

        var suggested = $(this).data('suggested');

        $(this).keyup(function () {
            if (suggested && $(this).val().length > suggested) {
                counter.addClass('text-warning');
            } else {
                counter.removeClass('text-warning');
            }
        });

        $(this).characterCounter({
            limit: $(this).data('max'),
            counterSelector: $(this).closest('div').find('.count'),
            onExceed: function () {
                counter.addClass('text-danger');
            },
            onDeceed: function () {
                counter.removeClass('text-danger');
            }
        });
    });
});
