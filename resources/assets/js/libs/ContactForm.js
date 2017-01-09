import $ from 'jquery';
import toastr from 'toastr';
export default class ContactForm{

  static init(element, cta){
    this.element = element;
    $(element).show();
    $(element).click(()=>{
       console.log("invoke");
       $('.ui.modal.contact-form-modal').modal('show');
    });

    $(cta).click(()=>{
      console.log("ok");
    });

  }
};
