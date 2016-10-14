@extends('layouts.app')

@section('title', 'Articles')


@section('content')
  <div class="ui grid">
    @if(isset($articles))

      @if(config('blogger.articles_render_type') === 'single')
        @include('partials._articles_single')
      @elseif(config('blogger.articles_render_type') === 'multiple')
        @include('partials._articles_multiple')
      @else
        <div class="ui message yellow">
          <p>Unsupported articles render type. Please check your config/blogger.php </p>
          <p>Supported types: "single", "multiple"</p>
        </div>
      @endif

    @else
      <div class="column">
        <div class="ui message yellow">
          You must migrate and seed your databases to see the articles
        </div>
      </div>
    @endif
  </div><!--end of ui grid-->

@endsection
