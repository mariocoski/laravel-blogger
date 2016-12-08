import $ from 'jquery';
import toastr from 'toastr';
export default class ContactForm{

  static init(element){
    this.element = element;
    $(element).show();
    $(element).click(()=>{
      //invoke modal window
    });

    $('#contact-form-submit').click(()=>{
      console.log("ok");
    });

  }
};
