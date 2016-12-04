@extends('layouts.backend')

@section('title', 'Page Title')

@section('content')
<h2>Media Manager</h2>
<iframe src="{{url('filemanager/show')}}" class="media-manager-frame"></iframe>

@endsection
