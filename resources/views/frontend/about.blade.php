@extends('layouts.app')

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

					<div class="ui tiny image">
	                    <a href="{{url('/blog/'.$author->display_name)}}">
	                        <img class="ui tiny circular image" src="{{(!empty($author->avatar))? url('images/avatars/'.$author->avatar): url('images/avatars/avatar_default.png')}}">
	                    </a>
	                </div><!--end of image-->

	                <div class="middle aligned content">
	                    <a class="header" href="{{url('/blog/'.$author->display_name)}}"><h3>{{ $author->display_name }} </h3></a>
	                    <div class="description">
	                    	<span class=" item-mute">{{ $author->bio }}</span>
	                    </div>
	                </div><!--end of content-->

	                <div class="middle aligned content right floated">
						<a class="ui right floated tiny  primary icon button no-wrap" href="{{url('/blog/'.$author->display_name)}}">
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
