$(document).on('ajaxComplete ready', function () {

    // Initialize sliders
    $('[data-provides="anomaly.field_type.slider"]:not(.ui-slider)').each(function () {

        var slider = $(this);

        var value = String(slider.data('value')).split(',');

        slider.slider({
            min: slider.data('min'),
            max: slider.data('max'),
            step: slider.data('step'),
            range: slider.data('range')
        });

        if (value.length > 1) {
            slider.slider('values', value);
        } else {
            slider.slider('value', value);
        }

        slider.addSliderSegments(slider.data('max'));

        slider.on('slide', function (event, ui) {

            if (ui.values == undefined) {
                slider.prev('.value-label').find('.value').text(ui.value);
                slider.find('input').val(ui.value);
            } else {
                slider.prev('.value-label').find('.value').text(String(ui.values).replace(',', '-'));
                slider.find('input').val(ui.values);
            }
        });
    });
});
