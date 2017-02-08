@extends('layouts.master')

@section('body_content')

  @include('partials._nav_sidebar')
  <div class="pusher">
    @include('partials._nav_top')
    <div class="ui backend-grid">
      <div class="backend-dashboard">

		<div class="sidebar hidden-mobile hidden-tablet">
		  <div class="ui vertical menu">

		    <div class="item text-center">

			  <div class="header">
				{{Auth::user()->getDisplayName()}}
			  </div>

			  <div class="ui center aligned">
				<a href="{{url('dashboard/avatar')}}" data-position="bottom center" data-tooltip="Change your avatar" data-inverted=""><img class="avatar-sm" src="{{(!empty(Auth::user()->avatar))? url('images/avatars/'.Auth::user()->avatar) : url("images/avatars/avatar_default.png")}}"></a>
			  </div>

			  <div class="menu">
				<a class="item">{{ Auth::user()->getRoleDisplayName() }}</a>
			  </div>

			</div><!--end of item-->
		    @include('partials._nav_dashboard')

		  </div><!--end of menu-->
		</div><!--end of sidebar-->

		<div class="view">
		  <div class="ui raised segments">
		    @yield('content')
		    <div class="ui segment secondary text-center">
		      <div class="credits-info">
		        @include('partials._credits_footer')
		      </div>
		    </div>
		  </div><!--end of segments-->
		</div><!--end of view-->

	  </div><!--end of backend-dashboard-->
    </div><!--end of backend-grid-->
  </div><!--end of pusher-->

@stop

@section('body_scripts')
   @yield('scripts')
@stop
