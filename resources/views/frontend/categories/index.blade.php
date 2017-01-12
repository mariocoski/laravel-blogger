@extends('layouts.app')

@section('title', 'Categories')
@section('content')

    <div class="ui grid grid-with-margin">
      <div class="ui container-narrowed">
        <div class="ui column text">
          <div class="ui segment segment-padding">

              <h2>Categories of Articles</h2>
              @if($categories && count($categories) > 0)
               <div class="ui relaxed divided list ">

                @foreach($categories as $category)
                    <div class="item">
                      <a class="ui right floated tiny  primary icon button no-wrap" href="{{ url('categories/'.$category->slug) }}">
                        <i class="eye icon"></i> See articles
                      </a>

                      <i class="large folder {{ ($category->getArticlesCountAttribute() === 0 )? 'outline' : ''}}  orange middle aligned icon"></i>
                      <div class="content">
                        <a class="header" href="{{ url('categories/'.$category->slug) }}"><h3>{{ $category->name }} </h3></a>
                        <div class="description">Contains {{ $category->getArticlesCountAttribute() }} article{{($category->getArticlesCountAttribute() === 1)? '': 's'}}</div>
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
