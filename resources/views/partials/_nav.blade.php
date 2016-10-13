
<div class="ui fixed inverted menu">
  <div class="ui container">
    <a href="/" class="item">
      <img src="{{ LaravelLocalization::getNonLocalizedURL('images/logo_sm.png') }}" alt="{{config('app.name')}}">
    </a>
    <a data-order="1" class="item active" href="/">Blog</a>
    <a data-order="2" class="item" href="{{ LaravelLocalization::getLocalizedURL(null, trans('routes.authors'))}}">Authors</a>
    <a data-order="3" class="item" href="{{ LaravelLocalization::getLocalizedURL(null, trans('routes.contact'))}}">Contact</a>
    @if(config('blogger.search_engine'))
    <div class="item">
      <div class="ui left icon input search-box" >
        <i class="search icon"></i>
        <input type="text"  placeholder="Search...">
      </div>
    </div>
    @endif
    @if(config('blogger.multilingual'))
      <div class="item">
        <div class="ui floating dropdown labeled search icon orange button">
          <i class="world icon"></i>
          <span class="text">{{ LaravelLocalization::getCurrentLocaleName() }}</span>
          <div class="menu">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
              <a rel="alternate" class="item" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                {{ $properties['name'] }}
              </a>
            @endforeach
          </div>
        </div>
      </div>
    @endif
    <div class="ui right item">
    @if (Auth::guest())
      <a class="ui inverted button" href="{{ LaravelLocalization::getLocalizedURL(null, trans('routes.login'))}}">Login</a>
      &nbsp;
      <a class="ui inverted button" href="{{ LaravelLocalization::getLocalizedURL(null, trans('routes.register'))}}">Register</a>
    @else
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>

    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{ url('/logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>

    @endif
    </div>
  </div>
</div>
