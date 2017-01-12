@extends('layouts.app')

@section('title', 'Tags')
@section('content')

    <div class="ui grid grid-with-margin">
      <div class="ui container-narrowed">
        <div class="ui column text">
          <div class="ui segment segment-padding">

               <h2>Tag: {{$tag->name}}</h2>
               <div class="ui relaxed divided list ">
				<div class="ui divided items">
					@foreach($tag->articles as $article)
					<div class="item">

	                     <div class="ui tiny image">
	                        <a href="{{url('/blog/'.$article->slug)}}">
	                          <img class="ui tiny image" src="{{(!empty($article->article_image))? url(config('blogger.filemanager.upload_path').'/'.$article->article_image): url('images/placeholder.gif')}}">
	                        </a>
	                    </div>
	                    <div class="middle aligned content">
	                        <a class="header" href="{{url('/blog/'.$article->slug)}}"><h3>{{ $article->title }} </h3></a>
	                        <div class="description"><a href="">{{ $article->author_name }}</a> <span class=" item-mute">| {{$article->published_at->diffForHumans()}}</span></div>

	                    </div>
	                    <div class="middle aligned content right floated">
							   <a class="ui right floated tiny  primary icon button no-wrap"  href="{{url('/blog/'.$article->slug)}}">
		                        <i class="eye icon"></i> Read article
		                      </a>
						</div>

                    </div>

					@endforeach
					</div>
               </div>
         </div>
       </div>
    </div>
  </div>


@endsection
