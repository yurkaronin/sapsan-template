!function(n){"function"==typeof define&&define.amd?define("admin",n):n()}((function(){"use strict";jQuery(document).ready((function(n){n(".js-wpshop-reset-settings").on("click",(function(){var t=n(this);if(confirm("Are you sure?")){var e={action:"wpshop_reset_settings",_wpnonce:t.data("nonce")};jQuery.post(ajaxurl,e,(function(n){t.text(n)}))}return!1})),n(".customize-control-range input[type=range]").each((function(){var t=n(this);n('<span class="customize-control-range-val">'+t.val()+"</span>").insertAfter(t),t.on("input change",(function(){var e=n(this).val();t.next().text(e)}))}))}))}));