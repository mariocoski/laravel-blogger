<!-- SIDEBAR MENU -->
<div class="ui left vertical menu sidebar">
  <a href="{{ url('/') }}" class="item">
    <img src="{{ url('images/logo_sm.png') }}" alt="{{config('app.name')}}">
  </a>
  <a href="#" class="item sidebar-trigger"><i class="close icon"></i> Close menu</a>
   @if(config('blogger.search_engine.enabled'))
    <div class="item">
      <form class="search-form-sm" action="{{ url('search') }}">
      <div class="ui search">
        <div class="ui icon input">
          <input class="prompt" type="text" name="query" placeholder="Search articles...">
          <i class="search icon"></i>
        </div>
        <div class="results"></div>
      </div>
      </form>
    </div>
  @endif
  @if(Session::has( config('blogger.auth.impersonification.session_name')))
    <a class="item" href="{{ url('dashboard/back-to-admin-mode') }}" name="back-to-admin-mode"><i class="spy icon"></i> Back to Admin Mode</a>
  @endif
  <a class="item" href="{{ url('/')}}">
     <i class="newspaper icon"></i>
    Blog
  </a>
  <div class="ui item">
     <div class="ui fluid dropdown">
      <div class="text">Categories</div>
      <i class="dropdown icon"></i>
      <div class="menu menu-sidebar">
        @include('partials._nav_categories')
      </div>
     </div>
  </div>
  <a class="item" href="{{url('about')}}">
    <i class="info circle icon"></i>
    About
  </a>
  @if(Auth::check())
    @include('partials._nav_dashboard')
  @endif
  <a class="item" href="{{ url('logout') }}" name="logout">
    <i class="power icon"></i> Log out
  </a>
 </div>

<!--END OF SIDEBAR MENU -->
