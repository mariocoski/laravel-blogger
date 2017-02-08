@extends('layouts.frontend')

@section('title', 'Author - '.$author->display_name)

@section('content')
<div class="ui segments raised">

  <div class="ui segment large">
    {!! Breadcrumbs::render('frontend.about.author',$author) !!}
  </div><!--end of segment-->

  <div class="ui segment teal padded">
    <h2>Author</h2>
    @if(isset($author))
		 <div class="ui divided items">
				<div class="item">
					<div class="ui image">
	                    <a href="{{url('/blog/'.$author->display_name)}}">
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
	            </div><!--end of item-->
	    </div><!--end of item-->
	    @endif

	    <h2>Articles</h2>
	    @if(count($author->articles) > 0 )
		<div class="ui divided items">
			@foreach($author->articles as $article)
				  <div class="item">
				    <div class="ui tiny image">
				        <a href="{{url('/blog/'.$article->slug)}}">
				          <img class="ui tiny image hoverable" src="{{(!empty($article->article_image))? url(config('blogger.filemanager.upload_path').'/'.$article->article_image): url('images/placeholder_640x480.png')}}">
				        </a>
				    </div>
				    <div class="middle aligned content">
			            <a class="header" href="{{url('/blog/'.$article->slug)}}"><h3>{{ $article->title }} </h3></a>
			            <div class="description"><a href="">{{ $article->author_name }}</a> <span class=" item-mute">| {{$article->published_at->diffForHumans()}}</span></div>
			        </div>
				    <div class="middle aligned content right floated">
						<a class="ui right floated tiny primary icon button no-wrap"  href="{{url('/blog/'.$article->slug)}}">
				            <i class="eye icon"></i> Read article
				    	 </a>
					</div>
				</div>

			@endforeach
		</div>
	    @else
	        <div class="ui message yellow">Author does not have any articles yet</div>
	    @endif
    </div><!--end of segment-->
</div><!--end of segments-->
@endsection
