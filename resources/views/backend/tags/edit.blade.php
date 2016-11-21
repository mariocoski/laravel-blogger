edit.blade.php
@extends('layouts.backend')

@section('title', 'Page Title')

@section('content')

@if(!empty($tag))
<h2>Update a Tag</h2>
<form class="ui form" method="POST" action="{{url('dashboard/tags/'.$tag->id)}}">
{{method_field('PUT')}}
@else
<h2>Create a Tag</h2>
<form class="ui form" method="POST" action="{{url('dashboard/tags')}}">
@endif
  {{csrf_field()}}
  @include('partials._errors')
  @include('partials._success',['flashSuccess'=>'status'])
  <div class="field fluid {{ $errors->has('name') ? 'error' : '' }}">
    <label for="tag-name">Name</label>
    <div class="ui input">
      <input type="text" name="name" id="tag-name" placeholder="Name" value="{{  ($tag->name) ?? old('name') }}" >
    </div>
  </div>

  <div class="field fluid {{ $errors->has('slug') ? 'error' : '' }}">
    <label for="tag-slug">Slug</label>
    <div class="ui input">
      <input type="text" name="slug" id="tag-slug" placeholder="Slug" value="{{ ($tag->slug) ?? old('slug') }}" >
    </div>
  </div>

    <button class="ui fluid fluid orange submit button" type="submit" name="submit">
    @if(!empty($tag))
      Update
    @else
      Create
    @endif
     tag
   </button>
</form>


@endsection
