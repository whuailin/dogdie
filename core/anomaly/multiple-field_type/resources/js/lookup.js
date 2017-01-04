$(function () {

    // Initialize multiple pickers
    $('[data-provides="anomaly.field_type.multiple"]').each(function () {

        var input = $(this);
        var field = input.data('field_name');
        var wrapper = input.closest('.form-group');
        var modal = $('#' + field + '-modal');

        var selected = $('[name="' + field + '"]').val().split(',');

        modal.on('click', '[data-entry]', function (e) {

            e.preventDefault();

            selected.push(String($(this).data('entry')));

            $('[name="' + field + '"]').val($.unique(selected).join(','));

            $(this).closest('tr').addClass('success').fadeOut();

            wrapper.find('.selected').load(REQUEST_ROOT_PATH + '/streams/multiple-field_type/selected/' + $(this).data('key') + '?uploaded=' + selected.join(','), function () {
                wrapper.sort();
            });

            $(wrapper).find('[data-dismiss="multiple"]').removeClass('hidden');
        });

        $(wrapper).on('click', '[data-dismiss="multiple"]', function (e) {

            e.preventDefault();

            selected.splice(selected.indexOf(String($(this).data('entry'))), 1);

            $('[name="' + field + '"]').val(selected.join(','));

            $(this).closest('tr').addClass('danger').fadeOut();
        });

        wrapper.sort = function () {
            wrapper.find('.selected table').sortable({
                nested: false,
                handle: '.handle',
                itemSelector: 'tr',
                itemPath: '> tbody',
                containerSelector: 'table',
                placeholder: '<tr class="placeholder"/>',
                afterMove: function ($placeholder) {

                    $placeholder.closest('table').find('button.reorder').removeClass('disabled');

                    $placeholder.closest('table').find('.dragged').detach().insertBefore($placeholder);

                    selected = [];

                    $(wrapper.find('table').find('[data-dismiss="multiple"]')).each(function () {
                        selected.push(String($(this).data('entry')));
                    });

                    $('[name="' + field + '"]').val(selected.join(','));
                }
            });
        }

        // Sort initially
        wrapper.sort();
    });
});
