@extends('layouts.backend')

@section('title', 'Page Title')

@section('content')

<h2>Upload Avatar</h2>
<form class="ui form" method="POST" action="{{url('dashboard/avatar')}}">
{{method_field('PUT')}}

  {{csrf_field()}}
  @include('partials._errors')
  @include('partials._success',['flashSuccess'=>'status'])

</form>

@endsection
