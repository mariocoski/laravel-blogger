
<div class="ui inverted vertical masthead center aligned segment fixed">
  <div class="ui container">
    <div class="ui large secondary inverted pointing menu">
    <a class="item" href="/">
        <a href="/" class="image">
          <img src="{{ LaravelLocalization::getNonLocalizedURL('images/logo_sm.png') }}">
        </a>
    </a>
    <a data-order="1" class="item active" href="/">Blog</a>
    <a data-order="2" class="item" href="{{ LaravelLocalization::getLocalizedURL(null, trans('routes.authors'))}}">Authors</a>
    <a data-order="3" class="item" href="{{ LaravelLocalization::getLocalizedURL(null, trans('routes.contact'))}}">Contact</a>
      <div class="ui right item">
        <a class="ui inverted button" href="{{ LaravelLocalization::getLocalizedURL(null, trans('routes.login'))}}">Login</a>
        <a class="ui inverted button" href="{{ LaravelLocalization::getLocalizedURL(null, trans('routes.register'))}}">Register</a>
      </div>
  </div>
  </div>
</div>

<!-- Sidebar Menu -->
<!-- <div class="ui vertical inverted sidebar menu">
  <a class="active item">Home</a>
  <a class="item">Work</a>
  <a class="item">Company</a>
  <a class="item">Careers</a>
  <a class="item">Login</a>
  <a class="item">Signup</a>
</div>
<div class="pusher">
</div> -->
<!--
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
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
                    </li>
                @endif -->
