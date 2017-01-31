@extends('layouts.frontend')

@section('title', 'Sitemap')

@section('content')
<div class="ui segments raised">

  <div class="ui segment large">
    {!! Breadcrumbs::render('frontend.sitemap') !!}
  </div><!--end of segment-->

  <div class="ui segment teal padded">
    <h2>Sitemap</h2>


  </div><!--end of segment-->
</div><!--end of segments-->
@endsection
