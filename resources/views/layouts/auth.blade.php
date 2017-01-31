@extends('layouts.master')

@section('head_css')
  <link href="{{ url('css/auth.css') }}" rel="stylesheet">
@stop

@section('body_content')
  @yield('content')
@stop

@section('body_scripts')
  @yield('scripts')
@stop
