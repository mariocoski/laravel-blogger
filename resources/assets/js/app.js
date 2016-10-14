import $ from 'jquery';
import jQuery from 'jquery';
import toastr from 'toastr';
// export for others scripts to use
window.$ = $;
window.jQuery = jQuery;
window.toastr = toastr;
const rrssb = require('rrssb');
$(document).ready(function() {
//  $('#search-item').popup();
$('.ui.search')
  .search({
    apiSettings: {
      url: '/autocomplete/?q={query}'
    },
    type: 'standard'
  })
;

$('img.image')
  .visibility({
    type       : 'image',
    transition : 'fade in',
    duration   : 1000
  })
;

$('.rrssb-buttons').rrssb({
  // required:
  title: 'This is the email subject and/or tweet text',
  url: 'http://rrssb.ml/',

  // optional:
  description: 'Longer description used with some providers',
  emailBody: 'Usually email body is just the description + url, but you can customize it if you want'
});


// let delay = (()=>{
//   let timer = 0;
//   return (callback, ms)=>{
//     clearTimeout (timer);
//     timer = setTimeout(callback, ms);
//   };
// })();
//
// $('#search-box').keyup(()=>{
//     delay(()=>{
//       let word = $('#search-box').val();
//       console.log(word);
//       if(word.length > 2){
//           $('#search-item').attr('data-tooltip','All users to your feed: '+word+'\n'+"dasdasdasd");
//       }else{
//           $('#search-item').removeAttr('data-tooltip')
//       }
//
//     }, 500 );
// });

//menu active items
$('.ui.dropdown').dropdown();
$('.left.sidebar').first().sidebar('attach events', '.sidebar-trigger');
  // let activeMenuItem = parseInt(localStorage.getItem('menu_active_item'));
  // if(activeMenuItem){
  //   let item = $('.item[data-order="'+activeMenuItem+'"]');
  //   if(!item.hasClass('dropdown')){
  //     item.addClass('active')
  //         .siblings('.item')
  //         .removeClass('active');
  //   }
  // }
  //
  //
  //    $('.ui.menu')
  //       .on('click', '.item', function() {
  //         if(!$(this).hasClass('dropdown')) {
  //           localStorage.setItem('menu_active_item',$(this).attr('data-order'));
  //           $(this)
  //             .addClass('active')
  //             .siblings('.item')
  //               .removeClass('active');
  //         }
  //   });
});
