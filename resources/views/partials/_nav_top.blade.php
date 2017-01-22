<!--FULL SIZE MENU -->
<div class="ui fixed inverted menu menu-top">
  <div class="ui container">

    <a href="{{ url('/') }}" class="item">
      <img src="{{ url('images/logo_sm.png') }}" alt="{{config('app.name')}}">
    </a>
    <div class="item hidden-large-desktop hidden-small-desktop">
      <a href="#" class="sidebar-trigger"><i class="sidebar icon"></i></a>
    </div>

    <a class="item icon hidden-mobile hidden-tablet" href="{{ url('/') }}">Blog</a>
    <div class="ui item hidden-mobile hidden-tablet floating  dropdown labeled icon">
      <span class="text">Categories</span>
      <i class="dropdown icon"></i>
      <div class="menu">
          @include('partials._nav_categories')
      </div>
    </div>
    <a class="item hidden-mobile hidden-tablet" href="{{ url('about') }}">About</a>

    @if(config('blogger.search_engine.enabled'))
    <form class="search-form-sm hidden-mobile hidden-tablet" action="{{ url('search') }}">
      <div class="item">
        <div class="ui search">
          <div class="ui icon input">
            <input class="prompt top" type="text" name="query" placeholder="Search articles...">
            <i class="search icon"></i>
          </div>
          <div class="results"></div>
        </div>
      </div>
    </form>
    @endif

    @if (Auth::guest())

      <a class="ui right item" href="{{ url('login') }}">Login</a>
      <a class="ui item" href="{{ url('register') }}">Register</a>

    @else

    <a class="ui right item"  href="{{ url('dashboard') }}"> <img class="ui avatar mini image  hidden-mobile" src="{{(!empty(Auth::user()->avatar))? url('images/avatars/'.Auth::user()->avatar) : url('images/avatars/avatar_default.png') }}">&nbsp;Dashboard</a>
    @if(Session::has( config('blogger.auth.impersonification.session_name')))
       <a class="item hidden-mobile hidden-tablet" href="{{ url('dashboard/back-to-admin-mode') }}" name="back-to-admin-mode"><i class="spy icon"></i> Back to Admin Mode</a>
    @endif
    <a class="item" href="{{ url('/logout') }}" name="logout"><i class="power icon"></i> Log out</a>

    @endif
  </div>
</div>
<!--END OF FULL SIZE MENU-->
