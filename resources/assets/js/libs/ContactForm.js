import $ from 'jquery';
import toastr from 'toastr';
export default class ContactForm{

  static init(element){
    this.element = element;
    $(element).show();
    $(element).click(()=>{
      if($(element).children(':first').hasClass('write')){
         $('#contact-form-modal').transition('fly right');
         $(element).children(':first').removeClass('write').addClass('remove');
      }else{
         $('#contact-form-modal').transition('fly right');
        $(element).children(':first').removeClass('remove').addClass('write');
      }


    });

    $('#contact-form-submit').click(()=>{
      console.log("ok");
        toastr.error("Please complete the form fields");
      $('#contact-form-modal')
  .transition('shake')
;
return;
      $('#contact-form-modal').addClass('loading');
      setTimeout(
      function()
      {
        $('#contact-form-modal').removeClass('loading');
        return false;
      }, 3000);

    });

  }


};
