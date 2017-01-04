$(function () {

    // Initialize text suggestions
    $('textarea[data-provides="anomaly.field_type.textarea"]').each(function () {

        var wrapper = $(this).closest('div');
        var counter = wrapper.find('.counter');

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

        /*$(this).textcomplete([
         {
         tags: ['{{ entry.last_name }}', '{{ forms_display($slug) }}'],
         match: /{{2}\s[a-z_.]+(?!}})$/,
         search: function (term, callback) {
         callback($.map(this.tags, function (tag) {
         return tag.indexOf(term) === 0 ? tag : null;
         }));
         },
         index: 0,
         replace: function (tag) {
         return tag;
         }
         },
         {
         tags: [
         '{input.subject}',
         '{input.email}',
         '{input.phone}',
         '{input.name}'
         ],
         match: /{{1}[a-z_.]+(?!}})$/,
         search: function (term, callback) {
         callback($.map(this.tags, function (tag) {
         return tag.indexOf(term) === 0 ? tag : null;
         }));
         },
         index: 0,
         replace: function (tag) {
         return tag;
         }
         }
         ]);*/
    });
});
