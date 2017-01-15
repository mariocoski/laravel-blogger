@extends('layouts.backend')

@section('title', 'Page Title')

@section('content')

<div class="ui segment large">
  {!! Breadcrumbs::render('backend.media') !!}
</div><!--end of segment-->

<div class="ui segment teal padded">
<h2>Media Manager</h2>
<iframe src="{{url('filemanager/show')}}" class="media-manager-frame"></iframe>
</div>
@endsection
