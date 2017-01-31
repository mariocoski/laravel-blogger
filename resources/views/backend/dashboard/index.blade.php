@extends('layouts.backend')

@section('title', 'Dashboard')

@section('content')
<div class="ui segment large">
  {!! Breadcrumbs::render('dashboard') !!}
</div><!--end of segment-->

<div class="ui segment teal padded">
	<h2>Dashboard</h2>
	@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor'))
	<div class="ui segment padded">
		<div class="ui relaxed grid">
		  <div class="three column row stackable">
		    <div class="column">
			<div class="ui menu text vertical">
		    	<div class="header item">Blog Snapshot</div>
		    	<div class="item">Site:
		    		@if($dashboard['site_enabled'])
		    			<strong><i class="circle icon green"></i>active</strong>
		    		@else
						<strong><i class="circle icon red"></i>inactive</strong>
		    		@endif
		    	</div>
		    	<div class="item">Search engine:
		    		@if($dashboard['search_engine_enabled'])
		    			<strong><i class="circle icon green"></i>enabled</strong>
		    		@else
						<strong><i class="circle icon red"></i>disabled</strong>
		    		@endif
		    	</div>
		    	<div class="item">Google Analytics:
		    		@if($dashboard['google_analytics_enabled'])
		    			<strong><i class="circle icon green"></i>enabled</strong>
		    		@else
						<strong><i class="circle icon red"></i>disabled</strong>
		    		@endif
		    	</div>
		    	<div class="item">Disqus:
		    		@if($dashboard['disqus_enabled'])
		    			<strong><i class="circle icon green"></i>enabled</strong>
		    		@else
						<strong><i class="circle icon red"></i>disabled</strong>
		    		@endif
		    	</div>


		   	</div>
		</div>
		<div class="column">
			<div class="ui menu text vertical">
				<div class="header item">Blog Summary</div>
				@if(Auth::user()->hasRole('admin'))
		    	 <a href="{{ url('dashboard/users')}}" class="item"><i class="users icon"></i> {{$dashboard['number_of_users']}} users</a>
		    	@endif
		    	 <a href="{{ url('dashboard/articles')}}" class="item"><i class="file text outline icon"></i> {{$dashboard['number_of_articles']}} articles</a>
		    	 <a href="{{ url('dashboard/categories')}}" class="item"><i class="folder icon"></i> {{$dashboard['number_of_categories']}} categories</a>
		    	 <a href="{{ url('dashboard/tags')}}" class="item"><i class="tags icon"></i> {{$dashboard['number_of_tags']}} tags</a>
			</div>
		</div>
		</div>
	</div>
	</div>
	@endif
	<div class="ui segment padded">
	<div class="ui relaxed grid">
	  <div class="three column row stackable">
	    <div class="column">
	    	<div class="ui menu text vertical">
	    		<div class="header item">Getting started</div>
	    		  <a href="{{ url('dashboard/avatar')}}" class="item">
				    <i class="image icon"></i> Change your avatar
				  </a>
				  <a href="{{ url('dashboard/profile')}}" class="item">
				    <i class="user icon"></i> Update your profile
				  </a>
				  <a href="{{ url('dashboard/profile')}}" class="item">
				    <i class="lock icon"></i> Change your password
				  </a>
				  <a href="{{ url('dashboard/favourite-articles')}}" class="item">
				    <i class="heart icon"></i> Check your favourite articles
				  </a>
			</div>
	    </div>
	    <div class="column">
	    @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor'))
	    	<div class="ui menu text vertical">
	    		<div class="header item">Blog Management</div>
	    		  <a href="{{ url('dashboard/articles/create')}}" class="item">
				    <i class="file text outline icon"></i> Create a new article
				  </a>
				  <a href="{{ url('dashboard/categories/create')}}" class="item">
				    <i class="folder icon"></i> Create a new category
				  </a>
				  <a href="{{ url('dashboard/tags/create')}}" class="item">
				    <i class="tag icon"></i> Create a new tag
				  </a>
				  <a href="{{ url('dashboard/media')}}" class="item">
				    <i class="image icon"></i> Manage images
				  </a>
			</div>
		@endif
	    </div>
	    <div class="column">
	    @if(Auth::user()->hasRole('admin'))
	    	<div class="ui menu text vertical">
	    		<div class="header item">Admin Tools</div>
	    		  <a href="{{ url('dashboard/settings')}}" class="item">
				    <i class="settings icon"></i> Update blog settings
				  </a>
				  <a href="{{ url('dashboard/tools')}}" class="item">
				    <i class="wrench icon"></i> Advanced tools
				  </a>
				  <a href="{{ url('dashboard/users')}}" class="item">
				    <i class="users icon"></i> Manage users
				  </a>
				  <a href="{{ url('dashboard/subscriptions')}}" class="item">
				    <i class="rss icon"></i> Manage subscriptions
				  </a>
				  <a href="{{ url('dashboard/settings')}}" class="item">
				    <i class="bar chart icon"></i> Google Analytics Setup
				  </a>
				  <a href="{{ url('dashboard/settings')}}" class="item">
				    <i class="comments icon"></i> Disqus Setup
				  </a>
			</div>
		@endif
	    </div>
	  </div>
	</div>
	</div>
</div>
@endsection
