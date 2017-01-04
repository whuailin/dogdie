$(document).on('ajaxComplete ready', function () {

    // Initialize file pickers
    $('[data-provides="anomaly.field_type.file"]').each(function () {

        var input = $(this);
        var field = input.data('field_name');
        var wrapper = input.closest('.form-group');
        var modal = $('#' + field + '-modal');

        modal.on('click', '[data-file]', function (e) {

            e.preventDefault();

            modal.find('.modal-content').append('<div class="modal-loading"><div class="active loader"></div></div>');

            wrapper.find('.selected').load(REQUEST_ROOT_PATH + '/streams/file-field_type/selected?uploaded=' + $(this).data('file'), function () {
                modal.modal('hide');
            });

            input.val($(this).data('file'));
        });

        $(wrapper).on('click', '[data-dismiss="file"]', function (e) {

            e.preventDefault();

            input.val('');

            wrapper.find('.selected').load(REQUEST_ROOT_PATH + '/streams/file-field_type/selected');
        });
    });
});
