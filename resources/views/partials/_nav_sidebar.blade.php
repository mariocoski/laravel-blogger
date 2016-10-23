<!-- SIDEBAR MENU -->
<div class="ui left vertical menu sidebar">
  <a href="/" class="item">
    <img src="images/logo_sm.png" alt="{{config('app.name')}}">
  </a>
  <a href="#" class="item sidebar-trigger"><i class="close icon"></i> Close menu</a>
  <a class="item" href="/">Blog</a>
  <a class="item" href="about">About</a>
  <a class="item" href="contact">Contact</a>
  @if(config('blogger.search_engine.enabled'))
    <div class="item">
      <form class="search-form-sm" action="search">
      <div class="ui search">
        <div class="ui icon input">
          <input class="prompt" type="text" name="q" placeholder="Search...">
          <i class="search icon"></i>
        </div>
        <div class="results"></div>
      </div>
      </form>
    </div>
  @endif
 </div>

<!--END OF SIDEBAR MENU -->
