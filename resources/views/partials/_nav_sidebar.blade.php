<!-- SIDEBAR MENU -->
<div class="ui left vertical menu sidebar">
  <a href="/" class="item">
    <img src="{{ url('images/logo_sm.png') }}" alt="{{config('app.name')}}">
  </a>
  <a href="#" class="item sidebar-trigger"><i class="close icon"></i> Close menu</a>
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
  <a class="item" href="/">
     <i class="newspaper icon"></i>
    Blog
  </a>
  <div class="ui item">
     <div class="ui fluid dropdown">
      <div class="text">Categories</div>
      <i class="dropdown icon"></i>
      <div class="menu menu-sidebar">
        <div class="item">Category 1</div>
        <div class="item">Category 2</div>
        <div class="item">Category 3</div>
      </div>
     </div>
  </div>
  <a class="item" href="about">
    <i class="info circle icon"></i>
    About
  </a>
  @if(Auth::check())
    @include('partials._nav_dashboard')
  @endif
  <a class="item" href="{{ url('/logout') }}" name="logout">
    <i class="power icon"></i> Log out
  </a>
 </div>

<!--END OF SIDEBAR MENU -->
