$(function () {

    // Initialize tag inputs.
    $('select[data-provides="multiple"]').each(function () {
        $(this).select2();
    });
});
