@extends('layouts.app')

@section('title', 'About')
@section('content')

    <div class="ui grid grid-with-margin">
      <div class="ui container-narrowed">
        <div class="ui column text">
          <div class="ui segment segment-padding">
              <h2>About</h2>

              <h2>Authors</h2>
              @if(isset($authors))
               <div class="ui relaxed divided list">
				  <div class="ui divided items">
				  	@foreach($authors as $author)
						<div class="item">

 						 <div class="ui tiny image">
	                        <a href="{{url('/blog/'.$author->display_name)}}">
	                          <img class="ui tiny circular image" src="{{(!empty($author->avatar))? url('images/avatars/'.$author->avatar): url('images/avatars/avatar_default.png')}}">
	                        </a>
	                    </div>
	                      <div class="middle aligned content">
	                        <a class="header" href="{{url('/blog/'.$author->display_name)}}"><h3>{{ $author->display_name }} </h3></a>
	                        <div class="description"><span class=" item-mute">{{ $author->bio }}</span></div>

	                    </div>
	                    <div class=" right floated">
							   <a class="ui basic icon button no-wrap" href="{{url('/blog/'.$author->display_name)}}">
		                        <i class="eye icon"></i> Read more
		                      </a>
						</div>


	                    </div>
					@endforeach
				  </div>
			   </div>
			  @endif
         </div>
       </div>
    </div>
  </div>


@endsection
