<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('favicon.ico') }}" type="image/x-icon" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url('semantic/semantic.css') }}">
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <title>{{ config('app.name', 'Blogger') }} - @yield('title')</title>
    <!-- Scripts -->
</head>
    <body>
      @include('partials._nav_sidebar')
      <div class="pusher">
        <div class="main-content">
          @include('partials._nav_top')
          <div class="ui grid-with-margin padded">
            <div class="ui container narrowed padded">
              @yield('content')
            </div>
          </div>
          @include('partials._footer')
        <div>

        @include('partials._contact_form_modal')
        @include('partials._scroll_top')
      </div><!--end of pusher-->
      @yield('scripts')
      <script src="{{ url('js/app.js') }}"></script>
      <script src="{{ url('semantic/semantic.js') }}"></script>
    </body>
  </html>
