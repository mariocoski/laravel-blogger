@extends('layouts.backend')

@section('title', 'Page Title')

@section('content')

<h2>Update Settings</h2>
<form class="ui form" method="POST" action="{{url('dashboard/settings')}}">


  {{csrf_field()}}
  @include('partials._errors')
  @include('partials._success',['flashSuccess'=>'status'])

  <div class="field fluid {{ $errors->has('title') ? 'error' : '' }}">
    <label for="title">Blog Title</label>
    <div class="ui input">
      <input type="text" name="title" id="title" placeholder="Blog Title" value="{{ ($user->title) ?? old('title')}}" autofocus>
    </div>
  </div>

   <div class="field fluid {{ $errors->has('author') ? 'error' : '' }}">
    <label for="author">Meta Author</label>
    <div class="ui input">
      <input type="text" name="author" id="author" placeholder="Last Name" value="{{ ($user->author) ?? old('author') }}" >
    </div>
  </div>


  <div class="field fluid {{ $errors->has('description') ? 'error' : '' }}">
    <label for="description">Meta Description</label>
    <div class="ui input">
      <input type="text" name="description" id="description" placeholder="First Name" value="{{  ($user->description) ?? old('description') }}" >
    </div>
  </div>



   <div class="field fluid {{ $errors->has('display_name') ? 'error' : '' }}">
    <label for="display_name">Meta Keywords</label>


   <div class="ui multiple search selection dropdown multiple-dropdown">
                <input type="hidden"> <i class="dropdown icon"></i>
                <div class="default text">Meta Key Words</div>
                <div class="menu"></div>
            </div>

   </div>
   <button class="ui fluid fluid orange submit button" type="submit" name="submit">
      Update Settings
   </button>
</form>


@endsection
