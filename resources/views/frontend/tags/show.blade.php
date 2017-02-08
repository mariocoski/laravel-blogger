@extends('layouts.frontend')

@section('title', 'Tag - '.$tag->name)

@section('content')
<div class="ui segments raised">

  <div class="ui segment large">
    {!! Breadcrumbs::render('frontend.tags.show', $tag) !!}
  </div><!--end of segment-->

  <div class="ui segment teal padded">
    <h2>Tag: {{$tag->name}}</h2>
    	@if($tag && count($tag->articles) > 0)
        	<div class="ui divided items">
				@foreach($tag->articles as $article)
					<div class="item">

	                     <div class="ui tiny image">
	                        <a href="{{url('/blog/'.$article->slug)}}">
	                          <img class="ui tiny hoverable image" src="{{(!empty($article->article_image))? url(config('blogger.filemanager.upload_path').'/'.$article->article_image): url('images/placeholder_640x480.png')}}">
	                        </a>
	                    </div><!--end of imate-->

	                    <div class="middle aligned content">
	                        <a class="header" href="{{url('/blog/'.$article->slug)}}"><h3>{{ $article->title }} </h3></a>
	                        <div class="description"><a href="">{{ $article->author_name }}</a> <span class=" item-mute">| {{$article->published_at->diffForHumans()}}</span></div>
	                    </div><!--end of image-->

	                    <div class="middle aligned content right floated">
							   <a class="ui right floated tiny  primary icon button no-wrap"  href="{{url('/blog/'.$article->slug)}}">
		                        <i class="eye icon"></i> Read article
		                      </a>
						</div><!--end of right content-->

                    </div><!--end of item-->
				@endforeach
			</div><!--end of items-->
		@endif
 	</div><!--end of segment-->
</div><!--end of segments-->

@endsection
