@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
<div class="ui grid grid-with-margin">
  <div class="ui container">
    <div class="ui segment">
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
                  <div class="image">
                     <img class="ui tiny image" src="{{(!empty($article->article_image))? url(config('blogger.filemanager.upload_path').'/'.$article->article_image): url('images/placeholder.gif')}}">
                  </div>
                  <div class="middle aligned content">
                    <a class="header">{{$article->title}}</a>
                    <div class="meta">
                      <span class="cinema">{{$article->author_name}}</span> <span>{{ $article->published_at->diffForHumans()}}</span>
                       <div>Category: {{$article->category_name}}</div>
                    </div>
                    <div class="description">
                      <p> <div>{{ str_limit($article->title, $limit = 50, $end = '...') }}</div></p>
                    </div>
                    <div class="extra">
                      <div class="ui label">IMAX</div>
                      <div class="ui label"><i class="globe icon"></i> Additional Languages</div>
                    </div>
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
  </div><!--end of container-->
</div><!--end of grid stackable-->
@endsection
