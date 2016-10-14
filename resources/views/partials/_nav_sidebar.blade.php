<!-- SIDEBAR MENU -->
<div class="ui left vertical menu sidebar">
  <a href="/" class="item">
    <img src="{{ LaravelLocalization::getNonLocalizedURL('images/logo_sm.png') }}" alt="{{config('app.name')}}">
  </a>
  <a href="#" class="item sidebar-trigger"><i class="close icon"></i> Close menu</a>
  <a data-order="1" class="item" href="/">Home</a>
  <a data-order="2" class="item" href="{{ LaravelLocalization::getLocalizedURL(null, trans('routes.about'))}}">About</a>
  <a data-order="3" class="item" href="{{ LaravelLocalization::getLocalizedURL(null, trans('routes.contact'))}}">Contact</a>
  @if(config('blogger.search_engine.enabled'))
    <div class="item">
      <form class="search-form-sm" action="{{ LaravelLocalization::getLocalizedURL(null, trans('routes.search'))}}">
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
 </div>
<!--END OF SIDEBAR MENU -->
