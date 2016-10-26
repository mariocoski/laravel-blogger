import $ from 'jquery';
export default class ShowPassword{

  static init(toggle, passwordField){
    $(toggle).click(()=>{
      let icon = $(toggle).children().first();
      if(icon.hasClass('eye')){
        icon.removeClass('eye').addClass('hide');
        $(passwordField).attr('type','text');
      }else{
        icon.removeClass('hide').addClass('eye');
        $(passwordField).attr('type','password');
      }
      return false;
    });
  }

};
