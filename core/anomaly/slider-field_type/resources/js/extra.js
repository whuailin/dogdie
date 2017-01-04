$(function () {

    // Add segments to a slider
    $.fn.addSliderSegments = function () {
        return this.each(function () {
            var $this = $(this),
                option = $this.slider('option'),
                amount = (option.max - option.min) / option.step,
                orientation = option.orientation;
            if ('vertical' === orientation) {
                var output = '', i;
                console.log(amount);
                for (i = 1; i <= amount - 1; i++) {
                    output += '<div class="ui-slider-segment" style="top:' + 100 / amount * i + '%;"></div>';
                }
                $this.prepend(output);
            } else {
                var segmentGap = 100 / (amount) + '%';
                var segment = '<div class="ui-slider-segment" style="margin-left: ' + segmentGap + ';"></div>';
                $this.prepend(segment.repeat(amount - 1));
            }
        });
    };
});
