@extends('layouts.article')

@section('title', 'Page Title')


@section('content')


<div class="ui grid grid-with-margin">
  <div class="ui container-narrowed">
    <div class="column text">
      @if($article)
      <article class="ui segment">
        <header>
          @if(Auth::user() && Auth::user()->hasRole('editor'))
          <div class="middle aligned content right floated">
            <a class="ui right floated tiny  basic icon button no-wrap"  href="{{ url('dashboard/articles/'.$article->id.'/edit') }}">
                <i class="edit icon"></i> Edit
            </a>
          </div>
          @endif
          <div class="ui horizontal list">
            <div class="item">
              <img class="ui circular tiny image" src="{{(!empty($article->author->avatar))? url('images/avatars/'.$article->author->avatar) : url('images/avatars/avatar_default.png')}}">
              <div class="content">
                <a class="ui header item-mute" href="">{{ $article->author_name }}</a>
                <div class="item-mute">{{ (!empty($article->author->job))? $article->author->job : "Editor" }}</div>

                <div class="item-mute">{{ $article->published_at->diffForHumans()}}</div>
              </div>
            </div>
          </div>

          <h1 class="article-title"><a href="">{{ $article->title }}</a></h1>

         <!--  <h3>{{ $article->subtitle }}</h3> -->
        </header>

        <div class="article-content">
         <div class="ui fluid image">
                 <div class="ui teal big ribbon label z-index-top">
                    <a href="{{ url('categories/'.$article->category->slug) }}" class="white-font">{{$article->category_name}}</a>
                </div>
                @if(Auth::check())
                <a class="ui right  teal corner label favorite" href="javascript:void(0)" data-id="{{ $article->id }}" data-content="Add to favourites" data-variation="inverted">
                  <i class="{{($article->isFavourite())? 'yellow active ': 'white '}}star icon"></i>
                </a>
                @endif
               <img class="ui fluid image" src="{{(!empty($article->article_image))? url(config('blogger.filemanager.upload_path').'/'.$article->article_image): url('images/placeholder.gif')}}" alt="picture">
          </div>
          {!!html_entity_decode($article->html_content)!!}
        </div>

        <footer>
          <div class="article-tags">
            <h4>Tags:</h4>
            @foreach($article->tags as $tag)
             <a class="ui large label" href="{{ url('tags/'.$tag->slug) }}">{{ $tag->name }}</a>
            @endforeach
          </div>

          @include('partials._disqus',['url'=>url('blog/'.$article->slug), 'identifier' => $article->id])
        </footer>

      </article>
      @endif
    </div><!--end of column-->


  </div><!--end of container-->

</div><!--end of grid stackable-->
@endsection
