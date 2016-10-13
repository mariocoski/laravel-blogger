import $ from 'jquery';
import jQuery from 'jquery';
import toastr from 'toastr';

// export for others scripts to use
window.$ = $;
window.jQuery = jQuery;
window.toastr = toastr;
$(document).ready(function() {
//  $('.search-box').popup();

$('.ui.dropdown').dropdown();
  let activeMenuItem = parseInt(localStorage.getItem('menu_active_item'));
  if(activeMenuItem){
    let item = $('.item[data-order="'+activeMenuItem+'"]');
    if(!item.hasClass('dropdown')){
      item.addClass('active')
          .siblings('.item')
          .removeClass('active');
    }
  }


     $('.ui.menu')
        .on('click', '.item', function() {
          if(!$(this).hasClass('dropdown')) {
            localStorage.setItem('menu_active_item',$(this).attr('data-order'));
            $(this)
              .addClass('active')
              .siblings('.item')
                .removeClass('active');
          }
        });
});
