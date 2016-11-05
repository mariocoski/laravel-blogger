import $ from 'jquery';
window.$ = window.jQuery = $;
import toastr from 'toastr';
window.toastr = toastr;

import Scroller from './libs/Scroller';
import SocialShare from './libs/SocialShare';
import ContactForm from './libs/ContactForm';
import lazyload from 'jquery-lazyload';
import ShowPassword from './libs/ShowPassword';


import List from 'list.js';
import ListPagination from './libs/list.pagination';

toastr.options = {
  closeButton : true,
  timeOut : 5000,
  positionClass: "toast-top-center"
}


$(document).ready(function() {
 var paginationOptions = {
    paginationClass: "list-pagination",
    outerWindow: 2,
  };

var options = {
  valueNames: [ 
    'user-table-id',
    'user-table-avatar',
    'user-table-role',
    'user-table-email',
    'user-table-display-name',
    'user-table-created-at',
    'user-table-updated-at'
  ],
  page: 5,
  item: "user-table-no-results",
  plugins: [
    ListPagination(paginationOptions)
  ]
};


var userTableList = new List('user-table-list', options);

$('#user-list-search').keyup(function(){
  let needle = $(this).val();
  console.log('value',needle);
  userTableList.search(needle);
});
if (window.location.hash == '#_=_'){
  
    history.replaceState 
        ? history.replaceState(null, null, window.location.href.split('#')[0])
        : window.location.hash = '';
}
(new Scroller).init('.scroller');

ContactForm.init('#contact-form-trigger');
ShowPassword.init('.show-password','.show-password-field');
ShowPassword.init('.show-new-password','.show-new-password-field');
ShowPassword.init('.show-new-password-confirmation','.show-new-password-confirmation-field');



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
