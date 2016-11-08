@extends('layouts.backend')

@section('title', 'Page Title')



@section('content')
<h2>Edit a User</h2>
{{$user->display_name}}
@endsection
