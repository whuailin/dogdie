$(document).on('ajaxComplete ready', function () {

    // Initialize tag inputs.
    $('select[data-provides="anomaly.field_type.checkboxes"]').each(function () {
        $(this).select2();
    });
});
