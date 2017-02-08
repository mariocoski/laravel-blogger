@extends('layouts.frontend')

@section('title', 'Tags')

@section('content')
<div class="ui segments raised">

  <div class="ui segment large">
    {!! Breadcrumbs::render('frontend.tags') !!}
  </div><!--end of segment-->

  <div class="ui segment teal padded">
    <h2>Tags</h2>
      @if($tags && count($tags) > 0)
        <div class="ui relaxed divided list">
          @foreach($tags as $tag)
            <div class="item">
              <a class="ui right floated tiny primary icon button no-wrap" href="{{ url('tags/'.$tag->slug) }}">
                  <i class="eye icon"></i> See articles
              </a>

              <i class="large folder {{ ($tag->getArticlesCountAttribute() === 0 )? 'outline' : 'primary'}} middle aligned icon"></i>

              <div class="content">
                <a class="header" href="{{ url('tags/'.$tag->slug) }}">
                  <h3>{{ $tag->name }} </h3>
                </a>
                <div class="description">Contains {{ $tag->getArticlesCountAttribute() }} articles</div>
              </div><!--end of content-->

            </div><!--end of item-->
          @endforeach
        </div><!--end of list-->
      @endif
  </div><!--end of segment-->
</div><!--end of segments-->
@endsection
