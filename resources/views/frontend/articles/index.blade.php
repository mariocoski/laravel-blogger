@extends('layouts.frontend')

@section('title', 'Articles')

@section('content')
    @if(isset($articles))
      @if(config('blogger.articles_render_type') === 'single')
        @include('partials._articles_single')
      @elseif(config('blogger.articles_render_type') === 'multiple')
        @include('partials._articles_multiple')
      @else
      <div class="ui grid">
        <div class="ui grid container">
          <div class="column">
            <div class="ui message yellow">
              <p>Unsupported articles render type. Please check your config/blogger.php </p>
              <p>Supported types: "single", "multiple"</p>
            </div>
          </div>
        </div>
      </div>
      @endif
    @else
    <div class="ui grid">
      <div class="ui grid container">
        <div class="column">
          <div class="ui message yellow">
            You must migrate and seed your databases to see the articles
          </div>
        </div>
      </div>
    </div>
    @endif

@endsection
