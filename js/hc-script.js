/*global jQuery*/
(function($) {
    "use strict";
    $(document).ready(function() {

// BOX
        $('.hc-fader, .banner').bxSlider({
            auto: true,
            mode : 'fade',
            pager : false,
            controls: false
            });
         });

// ACCORDION

    $( ".hc-accordion" ).accordion({
      heightStyle: "content",
      active: false,
      collapsible: true
    });

}(jQuery));