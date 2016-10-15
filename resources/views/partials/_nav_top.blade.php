<!--FULL SIZE MENU -->
<div class="ui fixed inverted menu">
  <div class="ui container">

    <a href="/" class="item">
      <img src="{{ LaravelLocalization::getNonLocalizedURL('images/logo_sm.png') }}" alt="{{config('app.name')}}">
    </a>
    <div class="item hidden-large-desktop hidden-small-desktop">
      <a href="#" class="sidebar-trigger"><i class="sidebar icon"></i></a>
    </div>
    <a class="item icon hidden-mobile hidden-tablet" href="/">Blog</a>
    <a class="item hidden-mobile hidden-tablet" href="{{ LaravelLocalization::getLocalizedURL(null, trans('routes.about'))}}">About</a>
    <!-- <a data-order="3" class="item hidden-mobile hidden-tablet" href="{{ LaravelLocalization::getLocalizedURL(null, trans('routes.contact'))}}">Contact</a> -->
    <a class="item hidden-mobile hidden-tablet" href="{{ LaravelLocalization::getLocalizedURL(null, trans('routes.contact'))}}">Contact</a>
    @if(config('blogger.search_engine.enabled'))
    <form class="search-form-sm hidden-mobile hidden-tablet" action="{{ LaravelLocalization::getLocalizedURL(null, trans('routes.search'))}}">
      <div class="item">
        <div class="ui search">
          <div class="ui icon input">
            <input class="prompt" type="text" name="q" placeholder="Search...">
            <i class="search icon"></i>
          </div>
          <div class="results"></div>
        </div>
      </div>
    </form>
    @endif
    @if(config('blogger.multilingual'))
    <div class="ui item hidden-mobile hidden-tablet floating  dropdown labeled icon">
      <i class="world icon"></i>&nbsp;
      <span class="text">{{ LaravelLocalization::getCurrentLocaleName() }}</span>
      <i class="dropdown icon"></i>
      <div class="menu">
      @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <a rel="alternate" class="item" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
          {{ $properties['name'] }}
        </a>
      @endforeach
      </div>
    </div>
    @endif
    @if (Auth::guest())
      <a class="ui right item" href="{{ LaravelLocalization::getLocalizedURL(null, trans('routes.login'))}}">Login</a>
      <a class="ui item" href="{{ LaravelLocalization::getLocalizedURL(null, trans('routes.register'))}}">Register</a>
    @else

    <div class="ui right item floating dropdown icon">

      <img class="ui avatar mini image" src="/images/avatar_default.png">
      <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item"><i class="user icon"></i>Profile</a>
        <a class="item"><i class="dashboard icon"></i>Dashboard</a>
        <a class="item"><i class="settings icon"></i>Settings</a>
        <a class="item"><i class="help icon"></i>Help</a>
      </div>
    </div>

    <a class="item" href="/"><i class="power icon"></i> Log out</a>
    @endif
  </div>
</div>
<!--END OF FULL SIZE MENU-->
