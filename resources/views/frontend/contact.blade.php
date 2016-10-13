@extends('layouts.app')

@section('title', 'Page Title')


@section('content')

<div class="ui stackable equal width grid">
  <div class="column">

<h1> Locale - {{ LaravelLocalization::getCurrentLocale() }}</h1>
    <ul class="language_bar_chooser">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                {{ $properties['native'] }}
            </a>
        </li>
    @endforeach
</ul>
    <!-- <button class="ui button">Default</button>
    <button class="ui primary button">Primary</button>
    <button class="ui secondary button">Secondary</button>
    <button class="ui basic button">Basic</button>
    <button class="ui compact button">
      Compact
    </button>

    <div class="ui divider"></div>
    <button class="ui icon button">
      <i class="heart icon"></i>
    </button>
    <button class="ui labeled icon button">
      <i class="heart icon"></i>
      Labeled
    </button>
    <button class="ui right labeled icon button">
      <i class="heart icon"></i>
      Labeled
    </button>

    <div class="ui divider"></div>

    <div class="ui buttons">
      <button class="ui button">Combo</button>
      <div class="ui floating dropdown icon button">
        <i class="dropdown icon"></i>
        <div class="menu">
          <div class="item">Choice 1</div>
          <div class="item">Choice 2</div>
          <div class="item">Choice 3</div>
        </div>
      </div>
    </div>

    <div class="ui floating search dropdown button">
      <span class="text">Search Dropdown</span>
      <div class="menu">
        <div class="item">Arabic</div>
        <div class="item">Chinese</div>
        <div class="item">Danish</div>
        <div class="item">Dutch</div>
        <div class="item">English</div>
        <div class="item">French</div>
        <div class="item">German</div>
        <div class="item">Greek</div>
        <div class="item">Hungarian</div>
        <div class="item">Italian</div>
        <div class="item">Japanese</div>
        <div class="item">Korean</div>
        <div class="item">Lithuanian</div>
        <div class="item">Persian</div>
        <div class="item">Polish</div>
        <div class="item">Portuguese</div>
        <div class="item">Russian</div>
        <div class="item">Spanish</div>
        <div class="item">Swedish</div>
        <div class="item">Turkish</div>
        <div class="item">Vietnamese</div>
      </div>
    </div>

    <div class="ui divider"></div>

    <div class="ui animated button" tabindex="0">
      <div class="visible content">Horizontal</div>
      <div class="hidden content">
        Hidden
      </div>
    </div>
    <div class="ui vertical animated button" tabindex="0">
      <div class="visible content">Vertical</div>
      <div class="hidden content">
        Hidden
      </div>
    </div>
    <div class="ui animated fade button" tabindex="0">
      <div class="visible content">Fade In</div>
      <div class="hidden content">
        Hidden
      </div>
    </div>

    <div class="ui divider"></div>
    <button class="ui disabled button">Disabled</button>
    <button class="ui loading button">Loading</button>

    <div class="ui divider"></div>

    <div class="ui buttons">
      <button class="ui button">1</button>
      <button class="ui button">2</button>
      <button class="ui button">3</button>
    </div>

    <div class="ui icon buttons">
      <button class="ui button"><i class="align left icon"></i></button>
      <button class="ui button"><i class="align center icon"></i></button>
      <button class="ui button"><i class="align right icon"></i></button>
      <button class="ui button"><i class="align justify icon"></i></button>
    </div>

    <div class="ui buttons">
      <button class="ui button">1</button>
      <div class="or"></div>
      <button class="ui button">2</button>
    </div>

    <div class="ui divider"></div>

    <div class="ui two top attached buttons">
      <div class="ui button">One</div>
      <div class="ui button">Two</div>
    </div>
    <div class="ui attached segment">
      <img src="../assets/images/wireframe/paragraph.png" class="ui wireframe image">
    </div>
    <div class="ui two bottom attached buttons">
      <div class="ui button">One</div>
      <div class="ui button">Two</div>
    </div>

  </div>
  <div class="column">
    <button class="ui mini button">Mini</button>
    <button class="ui tiny button">Tiny</button>
    <button class="ui small button">Small</button>
    <button class="ui large button">Large</button>
    <button class="ui big button">Big</button>
    <button class="ui huge button">Huge</button>
    <button class="ui massive button">Massive</button>
    <div class="ui divider"></div>
    <div class="spaced">
      <button class="yellow ui button">Yellow</button>
      <button class="orange ui button">Orange</button>
      <button class="green ui button">Green</button>
      <button class="teal ui button">Teal</button>
      <button class="blue ui button">Blue</button>
      <button class="purple ui button">Purple</button>
      <button class="pink ui button">Pink</button>
      <button class="red ui button">Red</button>
      <button class="black ui button">Black</button>
    </div>


    <div class="ui divider"></div>

    <div class="ui inverted segment">
      <button class="ui inverted button">Inverted</button>
      <button class="ui inverted basic button">Basic</button>
      <button class="ui inverted blue button">Colored</button>
      <button class="ui inverted blue basic button">Basic Colored</button>
    </div>

  </div>
</div> -->
@endsection
