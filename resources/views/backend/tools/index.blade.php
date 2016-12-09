@extends('layouts.backend')

@section('title', 'Page Title')

@section('content')
  <h2>Tools</h2>
  @include('partials._success',['flashSuccess'=>'success'])

  <h3>Maintenance Mode</h3>

  <h3>Reset Search Engine Index</h3>

  <h3>Clear cache</h3>
  <form method="POST" action="{{url('dashboard/clear-cache')}}" class="form-remove-cache">
    {{ csrf_field() }}
  	<button class="ui button orange"><i class="remove icon"></i> Clear cache</button>
  </form>

  <h3>Make database backup</h3>
@endsection
