import $ from 'jquery';
import jQuery from 'jquery';
// export for others scripts to use
window.$ = $;
window.jQuery = jQuery;



$(document)
  .ready(function() {
    $('.ui.dropdown').dropdown();

    $('.ui.buttons .dropdown.button').dropdown({
      action: 'combo'
    });
  })
;
