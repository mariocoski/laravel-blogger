
import bootstrap from './bootstrap';
import Scroller from './libs/Scroller';
import ShowPassword from './libs/ShowPassword';
import List from 'list.js';
import ListPagination from './libs/list.pagination';
import flatpickr from 'flatpickr';
import lazyload from 'jquery-lazyload';
import Cookies from 'js-cookie';
window.rrssb = require('rrssb');

$(document).ready(function() {


const ROOT_DIR = window.Blogger.url || "http://localhost"; 


if(Cookies.get('accept_cookies') != 1){
  $('.cookies-message').show();
}

$('.message.cookies-message .close').click(function() {
    $('.cookies-message').hide();
    Cookies.set('accept_cookies', 1, { expires: 7 });
    return false;
});

$('.ui.accordion').accordion();

 $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
 });

$(".date-of-birth").flatpickr({
   maxDate: new Date(),
});

$(".published-at").flatpickr({
   enableTime: true
});

$("#subscribtion-submit").click(function(){
  let email = $('#subscribtion-email').val();
  
  $('.ui.form.subscribtion-form').form({
    fields: {
      'subscribtion-email' : {
        identifier: 'subscribtion-email',
        rules: [
          {
            type   : 'empty',
            prompt : 'Email field is required'
          },
          {
            type : 'email',
            prompt: 'Email must be a valid email address'
          }
        ]
      }
    }
  });

  $('.ui.form.subscribtion-form').form("validate form");

  if(!$('.ui.form.subscribtion-form').form('is valid')){
    return false;
  }
  $(this).addClass("loading").addClass("disabled");
  
  $.ajax({
    url : "subscribe",
    type : "POST",
    data: { email : email}
  }).done((response) => {
    if(response.success === true){
      $('#subscribtion-success').removeClass("hidden");
      setTimeout(()=>{
        $('#subscribtion-success').addClass("hidden");
      },4000);
    }else if(response.success === false){
       $('#subscribtion-errors').text("Your email address already exists in our database").show();
      setTimeout(()=>{
         $('#subscribtion-errors').text("").hide();
      },4000);
    }

  }).fail((error) => {
     
      $('#subscribtion-errors').text("Your email address is invalid").show();
      setTimeout(()=>{
         $('#subscribtion-errors').text("").hide();
      },4000);
  }).always(()=>{
     $(this).removeClass("loading").removeClass("disabled");
      $('.ui.form.subscribtion-form').form('clear');
  });
});
 
//$("img.lazy.ui.fluid").show().lazyload({effect : "fadeIn",threshold : 500});
$("img.lazy.ui.fluid").lazyload({effect : "fadeIn",threshold : 500});


$('.form-delete-user').submit(function(){
  if(!confirm('Do you really want to delete this user?')){
     return false;
  }
});

$('.form-delete-article').submit(function(){
  if(!confirm('Do you really want to delete this article?')){
     return false;
  }
});

$('.form-delete-category').submit(function(){
  if(!confirm('Do you really want to delete this category and all related articles?')){
     return false;
  }
});

$('.form-delete-tag').submit(function(){
  if(!confirm('Do you really want to delete this tag and all related articles?')){
     return false;
  }
});

$('.form-remove-cache').submit(function(){
  if(!confirm('Do you really want to delete all cached files? It might take a while')){
     return false;
  }
});

$('.form-search-index').submit(function(){
  if(!confirm('Do you really want to reset all search indices? It might take a while')){
     return false;
  }
});




function convertToSlug(text)
{
    return text
        .toLowerCase()
        .replace(/[^\w ]+/g,'')
        .replace(/ +/g,'-')
        ;
}

function updateDisplayName(){
  let newValue = $('#first_name').val().trim() +" "+$('#last_name').val().trim();
  $('#display_name').attr('value',  newValue);
}

function updateCategorySlug(){
  let name = $('#category-name').val().trim();
  let newValue = (name)? convertToSlug(name) : "";
  $('#category-slug').attr('value', newValue);
}

function updateUserSlug(){
  let name = $('#display_name').val().trim();
  let newValue = (name)? convertToSlug(name) : "";
  $('#slug').attr('value', newValue);
}

function updateTagSlug(){
  let name = $('#tag-name').val().trim();
  let newValue = (name)? convertToSlug(name) : "";
  $('#tag-slug').attr('value', newValue);
}

function updateArticleSlug(){
  let name = $('#article-title').val().trim();
  let newValue = (name)? convertToSlug(name) : "";
  $('#article-slug').attr('value', newValue);
}

$('#first_name').change(() => {
  updateDisplayName();
});

$('#last_name').change(() => {
  updateDisplayName();
});

$('#display_name').change(()=>{
    console.log("changed");
    updateUserSlug();
 });

$('#category-name').change(() => {
  updateCategorySlug();
});

$('#article-title').change(() => {
  updateArticleSlug();
});



var topPaginationOptions = {
    paginationClass: "top-list-pagination",
    outerWindow: 1,
    innerWindow: 1,
};

var bottomPaginationOptions = {
    paginationClass: "bottom-list-pagination",
    outerWindow: 1,
     innerWindow: 1,
};

var userOptions = {
  valueNames: [ 
    'user-table-id',
    'user-table-avatar',
    'user-table-role',
    'user-table-email',
    'user-table-display-name',
    'user-table-created-at',
  ],
  sortClass: "sortable",
  listClass: "listable",
  page: 5,
  item: "user-table-no-results",
  plugins: [
    ListPagination(topPaginationOptions),
    ListPagination(bottomPaginationOptions)
  ]
};

var userTableList = new List('user-table-list', userOptions);

var categoryOptions = {
  valueNames: [ 
    'category-table-id',
    'category-table-name',
    'category-table-slug',
    'category-table-articles-count',
    'category-table-created-at',
  ],
  sortClass: "sortable",
  listClass: "listable",
  page: 5,
  item: "category-table-no-results",
  plugins: [
    ListPagination(topPaginationOptions),
    ListPagination(bottomPaginationOptions)
  ]
};
var categoryTableList = new List('category-table-list', categoryOptions);

var tagOptions = {
  valueNames: [ 
    'tag-table-id',
    'tag-table-name',
    'tag-table-articles-count',
    'tag-table-email',
    'tag-table-created-at',
  ],
  page: 5,
  sortClass: "sortable",
  listClass: "listable",
  item: "tag-table-no-results",
  plugins: [
    ListPagination(topPaginationOptions),
    ListPagination(bottomPaginationOptions)
  ]
};
var tagTableList = new List('tag-table-list', tagOptions);

var articleOptions = {
  valueNames: [ 
    'article-table-id',
    'article-table-title',
    'article-table-category-name',
    'article-table-author-name',
    'article-table-status',
    'article-table-created-at',
  ],
  sortClass: "sortable",
  listClass: "listable",
  page: 5,
  item: "article-table-no-results",
  plugins: [
    ListPagination(topPaginationOptions),
    ListPagination(bottomPaginationOptions)
  ]
};
var articleTableList = new List('article-table-list', articleOptions);

if (window.location.hash == '#_=_'){  
    history.replaceState 
        ? history.replaceState(null, null, window.location.href.split('#')[0])
        : window.location.hash = '';
}

(new Scroller).init('.scroller');

$('#contact-form-trigger').show();

$('#contact-form-trigger').click(()=>{
    $('.ui.modal.contact-form-modal').modal('show');
     $('#contact-form').form({
      fields: {
        name : 'empty',
        email : ['empty', 'email'],
        message : 'empty'
      }
   });
});


$('#contact-form-submit').click(()=>{

    $('#contact-form').form('validate form');

    if($('#contact-form').form('is valid') !== true){
       return false;
    }

    $('#contact-form').addClass("loading");

    $.ajax({
      url: ROOT_DIR + "/contact",
      type: "POST",
      data: $('#contact-form').form('get values')

    }).done((response)=>{

      $('#contact-success').removeClass("hidden");
      setTimeout(()=>{
        $('#contact-success').addClass("hidden");
      },4000);

    }).fail((error)=>{

      $('#contact-errors').text("There was a problem with processing your data").show();
      setTimeout(()=>{
         $('#contact-errors').text("").hide();
      },4000);

    }).always(()=>{
       $('#contact-form').removeClass("loading"); 
       $('#contact-form').form('clear');
    });
    
    return false;
  });





ShowPassword.init('.show-password','.show-password-field');
ShowPassword.init('.show-new-password','.show-new-password-field');
ShowPassword.init('.show-new-password-confirmation','.show-new-password-confirmation-field');



$('.ui.checkbox').checkbox();

$('.ui.dropdown').dropdown();

$('.multiple-dropdown').dropdown({allowAdditions: true});

$('.field-prevent-send').keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
    }
});

$('.left.sidebar').first().sidebar('attach events', '.sidebar-trigger');

$('.ui.search')
  .search({
    apiSettings: {
      url: ROOT_DIR+'/autocomplete/?query={query}',
    },
    minCharacters: 2,
    maxResults: 4,
    searchDelay: 300,
    type: 'standard'
  });


$('.favorite').popup();

function toggleFavorite(articleId){
  $.ajax({
    url : ROOT_DIR +  "/favourites",
    method: "POST",
    data: { id : articleId}
  }).done((response)=>{
    
  }).fail((error)=>{
    console.log(error);
  });
}

$('.favorite').click(function(){
  var star = $(this).children().first();

  if(star.hasClass('yellow active')){
        star.removeClass('yellow active');
  }else{
        star.addClass('yellow active');
  }
  var articleId = $(this).attr('data-id');
  toggleFavorite(articleId);
});





});
