@extends('layouts.backend')

@section('title', 'Page Title')


@section('content')
<h2>Favourite Articles</h2>

@if($articles)
	<div class="ui divided items">
	@foreach($articles as $article)

		  <div class="item">
		    <div class="ui tiny image">
		        <a href="{{url('/blog/'.$article->slug)}}">
		          <img class="ui tiny image" src="{{(!empty($article->article_image))? url(config('blogger.filemanager.upload_path').'/'.$article->article_image): url('images/placeholder.gif')}}">
		        </a>
		    </div>
		    <div class="middle aligned content">
		       <a href="{{url('/blog/'.$article->slug)}}">{{$article->title}}</a>
		    </div>
		  </div>

	@endforeach
	</div>
@endif

@endsection
