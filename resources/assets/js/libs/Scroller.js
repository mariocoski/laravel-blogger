import $ from 'jquery';
import * as _ from 'underscore';
export default class Scroller{

  init(element){
    this.element = element;
    this.onScroll();
    this.scrollToTop();
  }

  onScroll(element){
    $(window).scroll(_.debounce(()=>{
      if($(window).scrollTop()>600){
        $(this.element).fadeIn("fast");
      }else{
        $(this.element).fadeOut("fast");
      }
    }, 25));
  }

  scrollToTop(){
  
    $(this.element).click(()=>{
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
  }
};
