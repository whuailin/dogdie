$(document).on('ajaxComplete ready', function () {

    // Initialize editors.
    $('textarea[data-provides="anomaly.field_type.editor"]').each(function () {

        var lang = $(this).data('mode');
        var theme = $(this).data('theme');
        var wrapper = $(this).closest('.editor-field_type ');

        var editor = $(this).ace({
            lang: lang,
            theme: theme,
            width: $(this).closest('editor')
        });

        if ($(this).data('word-wrap') == 'yes') {
            editor.data('ace').editor.ace.getSession().setUseWrapMode(true);
        }

        // Toggle fullscreen mode.
        wrapper.find('[data-toggle="fullscreen"]').on('click', function (e) {

            e.preventDefault();

            var group = $(this).closest('.editor-field_type');
            var icon = $(this).find('i');

            // Fullscreen the field group.
            group.toggleClass('fullscreen');

            // Resize or restore.
            if (group.hasClass('fullscreen')) {

                group.find('.ace_editor, .ace_content').css('height', $(window).height()).find('textarea').focus();
                icon.toggleClass('fa-expand').toggleClass('fa-compress');
                window.dispatchEvent(new Event('resize'));
            } else {

                group.find('.ace_editor, .ace_content').css('height', group.find('textarea').first().height());
                icon.toggleClass('fa-expand').toggleClass('fa-compress');
                window.dispatchEvent(new Event('resize'));
            }
        });
    });
});
