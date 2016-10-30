<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/semantic/semantic.css">
    <link href="/css/app.css" rel="stylesheet">

    <title>{{ config('app.name', 'Blogger') }} - @yield('title')</title>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
	'csrfToken' => csrf_token(),
]); ?>
    </script>
</head>
    <body>
      @include('partials._nav_sidebar')
      <div class="pusher">
        @include('partials._nav_top')
        <div class="ui backend-grid">
		  <div class="backend-dashboard">
		    <div class="sidebar hidden-mobile hidden-tablet">
		    	<div class="ui vertical menu inverted">
		    		<div class="item text-center">
						<div class="header">
							{{(!empty(Auth::user()->display_name))? Auth::user()->display_name : "User"}}
						</div>
						<div class="ui image center aligned">
							<a href="{{url('/profile')}}"><img class="" src="{{(!empty(Auth::user()->avatar))? url(Auth::user()->avatar) : url("images/avatar_default.png")}}"></a>
						</div>
						<div class="menu">
							<a class="item">Administrator</a>
						</div>
					</div>
		    		@include('partials._nav_dashboard')
		        </div>
		    </div>
		    <div class="view">
		    	<div class="ui raised segments">
		    		<div class="ui segment">
		    			 <div class="ui breadcrumb">
						    <a class="section" href="{{url('/dashboard')}}">Dashboard</a>
						    <div class="divider"> / </div>
						    <div class="active section">Profile</div>
						  </div>
		  			</div>
		  			<div class="ui segment teal">
		  				@yield('content')
		  			</div>
		    	</div>
		    </div>
		  </div><!--end of container-->
		</div><!--end of grid stackable-->
        @include('partials._footer')
      </div><!--end of pusher-->
      @yield('scripts')
      <script src="/js/app.js"></script>
      <script src="/semantic/semantic.js"></script>
    </body>
  </html>
