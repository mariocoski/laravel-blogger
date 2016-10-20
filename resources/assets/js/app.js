import $ from 'jquery';
import jQuery from 'jquery';
import toastr from 'toastr';
import Scroller from './libs/Scroller';
import SocialShare from './libs/SocialShare';
import ContactForm from './libs/ContactForm';
import lazyload from 'jquery-lazyload';
window.$ = $;
window.jQuery = jQuery;
window.toastr = toastr;

toastr.options = {
  closeButton : true,
  timeOut : 5000,
  positionClass: "toast-top-center"
}


$(document).ready(function() {


(new Scroller).init('.scroller');
ContactForm.init('#contact-form-trigger');
SocialShare.init("id",{
  title:'This is the email subject and/or tweet text',
  url:  'http://rrssb.ml/',
  // optional:
  description:  'Longer description used with some providers',
  emailBody:  'Usually email body is just the description + url, but you can customize it if you want'
});

$('.ui.checkbox').checkbox();

$('.ui.dropdown').dropdown();
$('.left.sidebar').first().sidebar('attach events', '.sidebar-trigger');

$('.ui.search')
  .search({
    apiSettings: {
      url: '/autocomplete/?q={query}'
    },
    type: 'standard'
  })
;
//initialize placeholders for lazy loading$("img.lazy").lazyload({

$("img.lazy.ui.fluid").show().lazyload({effect : "fadeIn",threshold : 500});
// $('img.image')
//   .visibility({
//     type       : 'image',
//     transition : 'fade in',
//     duration   : 1000
//   })
// ;

$('.favorite').popup();

$('.favorite').click(function(){
  var star = $(this).children().first();

  if($(this).children().first().hasClass('yellow active')){
    star.removeClass('yellow active');
    toastr.success("Removed from favourite articles");
  }else{
    star.addClass('yellow active');
    toastr.success("Added to favourite articles");
  }

});


});
