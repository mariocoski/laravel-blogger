@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
    <div class="ui grid grid-with-margin">
      <div class="ui container-narrowed">
        <div class="ui column text">
          <div class="ui segment segment-padding">
        <h2>Search articles</h2>

        <div class="column">
          <form class="search-form-sm" action="search">

              <div class="ui search fluid">
                <div class="ui icon input">
                  <input class="prompt" type="text" name="query" value="{{ request('query') }}" placeholder="Search...">
                  <i class="search icon"></i>
                </div>

              </div>
          </form>
                @if(count($articles) > 0)
                 <p>We have found {{$articles->total()}} article{{(count($articles)>1)? "s":""}} matching "<b>{{Request::input('query')}}</b>"</p>
                 <div class="ui divided items">

                 @foreach($articles as $article)
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
                    <a class="ui right floated tiny  basic icon button no-wrap"  href="{{url('/blog/'.$article->slug)}}">
                            <i class="eye icon"></i> Read article
                       </a>
                  </div>
                  </div>
                 @endforeach
                 </div>
                @else
                  <p>Oops! We can't find any articles matching the criteria</p>
                @endif
              </div><!--end of column-->
              </div>
              @if($articles && count($articles))
                 <div class="ui card blogger-card fluid no-box-shadow text-center">
                    {{ $articles->links() }}
                 </div>
              @endif
      </div>
      </div>
  </div><!--end of container-->
</div><!--end of grid stackable-->
@endsection
