@extends('layouts.master')

@section('body_content')

<div class="body-auth">
  @yield('content')
</div>

@stop

@section('body_scripts')
  @yield('scripts')
@stop
