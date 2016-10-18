import $ from 'jquery';
export default class ContactForm{

  static init(element){
    this.element = element;
    $(element).attr('display','block');
    $(element).click(()=>{
      if($(element).children(':first').hasClass('write')){
         $('#contact-form-modal').fadeIn('1000');
         $(element).children(':first').removeClass('write').addClass('remove');
      }else{
         $('#contact-form-modal').fadeOut('1000');
        $(element).children(':first').removeClass('remove').addClass('write');
      }

    });

    $('#contact-form-submit').click(()=>{
      $('#contact-form-modal').addClass('loading');
      setTimeout(
      function()
      {
        $('#contact-form-modal').removeClass('loading');
      }, 3000);

    });

  }


};
