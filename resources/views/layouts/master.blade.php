<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('head_meta_tags')

    <title>{{ config('app.name', 'Blogger') }} | @yield('head_title', Settings::getMetaTitle())</title>

    <!--favicon-->
    <link rel="icon" href="{{ url('images/favicon.ico') }}" type="image/x-icon" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ url('js/app.js') }}" ></script>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/semantic/semantic.css">
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    @yield('head_css')
</head>

<body>

  @yield('body_content')

  <!-- Scripts -->
  <script src="{{ url('semantic/semantic.js') }}" ></script>

  @yield('body_scripts')

  @include('partials._google_analytics')

</body>
</html>
