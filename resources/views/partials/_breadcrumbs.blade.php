@if(isset($breadcrumbs))
<div class="ui breadcrumb large">
  @foreach ($breadcrumbs as $breadcrumb)
    @if (!$breadcrumb->last)
      <div class="section">
        <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
      </div>
      <span class="divider">/</span>
    @else
      <div class="section active">{{ $breadcrumb->title }}</div>
    @endif
  @endforeach
</div>
@endif
