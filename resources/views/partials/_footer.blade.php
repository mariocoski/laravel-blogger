<div class="ui inverted vertical footer segment">
   <div class="ui center aligned container">
     <div class="ui stackable inverted divided grid">
       <div class="three wide column">
         <h4 class="ui inverted header">Group 1</h4>
         <div class="ui inverted link list">
           <a href="#" class="item">Link One</a>
           <a href="#" class="item">Link Two</a>
           <a href="#" class="item">Link Three</a>
           <a href="#" class="item">Link Four</a>
         </div>
       </div>
       <div class="three wide column">
         <h4 class="ui inverted header">Group 2</h4>
         <div class="ui inverted link list">
           <a href="#" class="item">Link One</a>
           <a href="#" class="item">Link Two</a>
           <a href="#" class="item">Link Three</a>
           <a href="#" class="item">Link Four</a>
         </div>
       </div>
       <div class="three wide column">
         <h4 class="ui inverted header">Group 3</h4>
         <div class="ui inverted link list">
           <a href="#" class="item">Link One</a>
           <a href="#" class="item">Link Two</a>
           <a href="#" class="item">Link Three</a>
           <a href="#" class="item">Link Four</a>
         </div>
       </div>
       <div class="seven wide column">
         <h4 class="ui inverted header">Footer Header</h4>
         <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
       </div>
     </div>
     <div class="ui inverted section divider"></div>
     <a href="/">
       <img src="{{ LaravelLocalization::getNonLocalizedURL('images/logo_sm.png') }}" class="ui centered mini image" alt="{{config('app.name')}}">
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
