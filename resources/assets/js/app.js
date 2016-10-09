import $ from 'jquery';
import jQuery from 'jquery';
import toastr from 'toastr';

// export for others scripts to use
window.$ = $;
window.jQuery = jQuery;
window.toastr = toastr;
$(document).ready(function() {
  
  console.log("Loaded");
});
