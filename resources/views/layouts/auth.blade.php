<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/semantic/semantic.css">
    <link href="/css/auth.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <title>{{ config('app.name', 'Blogger') }} - @yield('title')</title>

</head>
    <body>

      @yield('content')

      <script src="/js/app.js"></script>
      <script src="/semantic/semantic.min.js"></script>
      @yield('scripts')
    </body>
  </html>
