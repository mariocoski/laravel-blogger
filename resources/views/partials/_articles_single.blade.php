<div class="ui grid grid-with-margin">
<div class="ui container text">
  <div class="column">
    @foreach($articles as $article)
      <div class="ui card blogger-card fluid teal">
        <div class="content">

          <div class="right floated meta">2 days ago</div>
          <a href=""><img class="ui avatar mini image" src="/images/avatar_default.png"> John Doe, Journalist</a>

        </div>

        <div class="content">

          <div class="ui fluid image">
              <!--TODO: change to auth check -->
                @if(Auth::guest())
                <a class="ui right  teal corner label favorite" href="javascript:void(0)" data-content="Add to favorites" data-variation="inverted">
                  <i class="white star icon" ></i>
                </a>
                @endif
                <a href="" >
                  <img class="ui fluid image lazy hoverable " data-original="images/{{$article->article_image}}"
                  src="images/placeholder.gif" height="480" width="640" alt="picture">
                  <noscript>
                    <img class="ui fluid image hoverable" height="480" width="640" src="images/{{$article->article_image}}">
                  </noscript>
                </a>
        </div>
        <h3><a href="">{{$article->title}}</a></h3>
      </div>
        <div class="extra content">
          <i class="share icon"></i> Share via:
          @include('partials._share_buttons')
        </div>
    </div>

    @endforeach
    <div class="ui card blogger-card fluid no-box-shadow text-center">
      {{ $articles->links() }}
    </div>

    <div class="ui card blogger-card fluid ">
      <div class="ui content text-center brand-teal">
      @include('partials._subscribe')
      </div>
    </div>
  </div>

</div>
</div>
