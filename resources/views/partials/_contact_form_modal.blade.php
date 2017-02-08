<a id="contact-form-trigger" href="javascript:void(0)">
  <i class="write large icon text-center"></i>
</a>
<div class="ui modal small contact-form-modal" >
  <i class="close icon"></i>
  <div class="header">
    Contact us!
  </div>
  <div class=" content">
    <div class="ui form" id="contact-form">
        <div class="field">
          <label>Name</label>
          <input type="text" name="name" id="name" placeholder="Name">
        </div>
        <div class="field">
          <label>Email</label>
          <input type="text" name="email" id="email" placeholder="Email">
        </div>
        <div class="field">
          <label>Message</label>
          <textarea rows="4" name="message" id="message" placeholder="Message" maxlength="2000"></textarea>
        </div>
        <div class="ui error message" id="contact-errors"></div>
         <div class="ui success message hidden" id="contact-success">
            <p>Your message has been send successfuly!</p>
          </div>
         <button class="ui primary fluid button submit" id="contact-form-submit">
           Send!
        </button>
    </div>
  </div>
</div>
