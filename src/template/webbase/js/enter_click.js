jQuery(window).keydown(function (event) {
    var focused = jQuery(':focus');
    if (focused[0] != '[object HTMLTextAreaElement]') {
        if (event.keyCode == 13) {
            jQuery('.wb3_modal_form').keyup(function (event) {
                if (event.keyCode == 13) {
                    jQuery('.wb3_modalbtn').click();
                }
            });
            jQuery('#wb3_search_line').keyup(function (event) {
                if (event.keyCode == 13) {
                    jQuery('#wb3_search').click();
                }
            });
            jQuery('.userdata').keyup(function (event) {
                if (event.keyCode == 13) {
                    jQuery('.login-button').click();
                }
            });
            event.preventDefault();
            return false;
        }
    }
});
