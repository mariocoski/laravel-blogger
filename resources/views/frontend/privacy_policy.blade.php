@extends('layouts.frontend')

@section('title', 'Privacy Policy')

@section('content')
<div class="ui segments raised">

  <div class="ui segment large">
    {!! Breadcrumbs::render('frontend.privacy-policy') !!}
  </div><!--end of segment-->

  <div class="ui segment teal padded">
    <h2>Privacy Policy</h2>


  </div><!--end of segment-->
</div><!--end of segments-->
@endsection
