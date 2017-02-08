@extends('layouts.frontend')

@section('title', 'Search')

@section('content')
<div class="ui segments raised">

  <div class="ui segment large">
    {!! Breadcrumbs::render('frontend.search') !!}
  </div><!--end of segment-->

  <div class="ui segment teal padded">
    <h2>Search articles</h2>
      <form class="search-form-sm" action="search">
        <div class="ui search fluid">
          <div class="ui icon input">
            <input class="prompt" type="text" name="query" value="{{ request('query') }}" placeholder="Search articles...">
            <i class="search icon"></i>
          </div><!--end of input-->
        </div><!--end of search fluid-->
      </form><!--end of form-->

      @if(count($articles) > 0)
        <p>We have found {{$articles->total()}} article{{(count($articles)>1)? "s":""}} matching "<b>{{Request::input('query')}}</b>"
        </p>

        <div class="ui divided items">
          @foreach($articles as $article)
            <div class="item">

              <div class="ui tiny image">
                <a href="{{url('/blog/'.$article->slug)}}">
                  <img class="ui tiny hoverable image" src="{{(!empty($article->article_image))? url(config('blogger.filemanager.upload_path').'/'.$article->article_image): url('images/placeholder_640x480.png')}}">
                </a>
              </div><!--end of image-->

              <div class="middle aligned content">
                <a class="header" href="{{url('/blog/'.$article->slug)}}"><h3>{{ $article->title }} </h3></a>
                <div class="description">
                  <a href="{{url('about/'.$article->author->slug)}}">{{ $article->author_name }}</a>
                  <span class=" item-mute">| {{$article->published_at->diffForHumans()}}</span>
                </div>
              </div><!--end of content-->

              <div class="middle aligned content right floated">
                <a class="ui right floated tiny primary icon button no-wrap"  href="{{url('/blog/'.$article->slug)}}">
                  <i class="eye icon"></i> Read article
                </a>
              </div><!--end of right content-->

            </div><!--end of item-->
          @endforeach
        </div><!--end of items-->
      @else
        <p>Oops! We can't find any articles matching the criteria</p>
      @endif
 </div><!--end of segment-->
</div><!--end of segments-->
@if($articles && count($articles))
<div class="ui card blogger-card fluid no-box-shadow text-center">
  {{ $articles->links() }}
</div>
 @endif

@endsection
