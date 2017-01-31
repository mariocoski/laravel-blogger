@extends('layouts.frontend')

@section('title', 'About')

@section('content')
<div class="ui segments raised">

  <div class="ui segment large">
    {!! Breadcrumbs::render('frontend.about') !!}
  </div><!--end of segment-->

  <div class="ui segment teal padded">
    <h2>Authors</h2>
    @if(isset($authors))
		 <div class="ui divided items">
			@foreach($authors as $author)
				<div class="item">

					<div class="ui image">
	                    <a href="{{url('/about/'.$author->slug)}}">
	                        <img class="ui image avatar-sm" src="{{(!empty($author->avatar))? url('images/avatars/'.$author->avatar): url('images/avatars/avatar_default.png')}}">
	                    </a>
	                </div><!--end of image-->

	                <div class="middle aligned content">
	                    <div class="header" href="{{url('/blog/'.$author->display_name)}}">
	                    	{{ $author->display_name }}, {{ (!empty($author->job))? $author->job : "Editor" }}
	                    </div>
	                    @if(!empty($author->website_url))
	                    <div class="description">
						   <a href="{{$author->website_url}}">{{$author->website_url}}</a>
	                    </div>
	                    @endif
	                    <div class="description">
	                    	<p class=" item-mute">{{ $author->bio }}</p>
	                    </div>

	                </div><!--end of content-->

	                <div class="middle aligned content right floated">
						<a class="ui right floated tiny  primary icon button no-wrap" href="{{url('/about/'.$author->slug)}}">
		                     <i class="eye icon"></i> Read more
		                </a>
					</div><!--end of right content-->

	            </div><!--end of item-->
			@endforeach
		</div><!--end of items-->
	@endif
    </div><!--end of segment-->
</div><!--end of segments-->
@endsection
