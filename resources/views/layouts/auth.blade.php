<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('favicon.ico') }}" type="image/x-icon" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/semantic/semantic.css">
    <link href="{{ url('css/auth.css') }}" rel="stylesheet">
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <title>{{ config('app.name', 'Blogger') }} - @yield('title')</title>

</head>
    <body>

      @yield('content')

      <script src="{{ url('js/app.js') }}"></script>
      <script src="{{ url('semantic/semantic.min.js') }}"></script>
      @yield('scripts')
    </body>
  </html>
