<div class="ui vertical segment inverted footer">
   <div class="ui center aligned middle aligned container footer-container">
     <div class="ui stackable inverted divided grid">
       <div class="five wide column">
         <h4 class="ui inverted header">Shortcuts</h4>
         <div class="ui inverted link list">
           <a href="#" class="item">Blog</a>
           <a href="#" class="item">Authors</a>
           <a href="#" class="item">Contact</a>
           <a href="#" class="item">Login</a>
           <a href="#" class="item">Registration</a>
         </div>
       </div>
       <div class="five wide column">
         <h4 class="ui inverted header">Address</h4>
         <div class="ui inverted link list">
           <div class="item"><i class="users icon"></i> Blogger</div>
           <div class="item"><i class="marker icon"></i>  London, United Kingdom</div>
           <a class="item" href="mailto:mariuszrajczakowski@gmail.com"><i class="mail icon"></i> mariuszrajczakowski@gmail.com</a>
            <a class="item" href="http://www.github.com/mariocoski"><i class="github icon"></i> http://www.github.com/mariocoski</a>
           <a class="item" href="http://www.example.com"><i class="linkify icon"></i> http://www.example.com</a>
        </div>
       </div>
       <div class="six wide column">
        <h4 class="ui inverted header">Support this free open-source project</h4>
        <p>All help comes directly from the community</p>
        <p><button class="ui button orange"><i class="paypal icon"></i> Donate now!</button></p>
       </div>
     </div>
     <div class="ui inverted section divider"></div>
     <a href="/">
       <img src="{{ url('images/logo_sm.png') }}" class="ui centered mini image" alt="{{config('app.name')}}">
     </a>
     <div class="ui horizontal inverted small divided link list">
       <a class="item" href="#">Site Map</a>
       <a class="item" href="#">Contact</a>
       <a class="item" href="#">Terms and Conditions</a>
       <a class="item" href="#">Privacy Policy</a>
     </div>
     @include('partials._credits_footer')
   </div>
 </div>
