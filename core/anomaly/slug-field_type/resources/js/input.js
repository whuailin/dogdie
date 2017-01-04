$(document).ready(function () {
    
    $('input[data-provides="anomaly.field_type.slug"]').each(function () {

        var config = {
            slug: this,
            lowercase: $(this).data('lowercase')
        };

        /**
         * Only slugify other fields if
         * value is empty OR configured
         * to always slugify field values.
         */
        if (!$(this).val() || $(this).data('always_slugify')) {
            config.slugify = '[data-field="' + $(this).data('slugify') + '"]:visible:first';
        }

        // Slugify slug inputs.
        $(this).slugify(config);
    });
});
