<div class="ui grid">
  <div class="ui container content-wrapper">
    <div class="column ">
      @if(isset($breadcrumbs))
          <div class="ui breadcrumb">
              @foreach ($breadcrumbs as $breadcrumb)
                  @if (!$breadcrumb->last)
                      <div class="section"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></div>
                      <span class="divider">/</span>
                  @else
                      <div class="section active">{{ $breadcrumb->title }}</div>
                  @endif
              @endforeach
          </div>
      @endif
    </div><!--end of column-->
  </div><!--end of container-->
</div><!--end of grid stackable-->
