@extends('layouts.master')

@section('body_content')
  @include('partials._nav_sidebar')

  <div class="pusher">
    <div class="main-content">
      @include('partials._nav_top')
      <div class="ui grid-with-margin padded">
        <div class="ui container narrowed padded">
          @yield('content')
          @include('partials._cookies_message')
        </div>
      </div>

      @include('partials._footer')

    </div>

    @include('partials._contact_form_modal')
    @include('partials._scroll_top')
  </div><!--end of pusher-->
@stop

@section('body_scripts')
  @yield('scripts')
@stop
