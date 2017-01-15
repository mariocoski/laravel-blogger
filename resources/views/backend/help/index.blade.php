@extends('layouts.backend')

@section('title', 'Help')


@section('content')
<div class="ui segment large">
  {!! Breadcrumbs::render('backend.help') !!}
</div><!--end of segment-->

<div class="ui segment teal padded">
  <h1>Content</h1>
</div>
@endsection
