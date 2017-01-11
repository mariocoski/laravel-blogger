@extends('layouts.app')

@section('title', 'Tags')
@section('content')

    <div class="ui grid grid-with-margin">
      <div class="ui container-narrowed">
        <div class="ui column text">
          <div class="ui segment segment-padding">

              <h2>Tags</h2>
              @if($tags && count($tags) > 0)
               <div class="ui relaxed divided list ">

                @foreach($tags as $tag)
                    <div class="item">
                      <a class="ui right floated tiny  basic icon button no-wrap" href="{{ url('tags/'.$tag->slug) }}">
                        <i class="eye icon"></i> See articles
                      </a>

                      <i class="large folder {{ ($tag->getArticlesCountAttribute() === 0 )? 'outline' : 'orange'}} middle aligned icon"></i>
                      <div class="content">
                        <a class="header" href="{{ url('tags/'.$tag->slug) }}"><h3>{{ $tag->name }} </h3></a>
                        <div class="description">Contains {{ $tag->getArticlesCountAttribute() }} articles</div>
                      </div>
                    </div>

                @endforeach

               </div>
              @endif

         </div>
       </div>
    </div>
  </div>


@endsection
