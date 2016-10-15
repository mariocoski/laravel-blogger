import $ from 'jquery';
import jQuery from 'jquery';
window.$ = $;
window.jQuery = jQuery;
let rrssb = require('rrssb');

export default class SocialShare{

  static init(id, options){
    if(!id){
      throw new Error("You must provide valid for your social share buttons");
    }
    const defaults = {
      // required:
      title:'This is the email subject and/or tweet text',
      url:  'http://rrssb.ml/',
      // optional:
      description:  'Longer description used with some providers',
      emailBody:  'Usually email body is just the description + url, but you can customize it if you want'
    }
    let settings = $.extend( {}, defaults, options);
    $('.rrssb-buttons').rrssb(settings);
  }


};
