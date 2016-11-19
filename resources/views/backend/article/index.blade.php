@extends('layouts.backend')

@section('title', 'Page Title')


@section('content')
  <h1>Content</h1>
   <div class="field fluid {{ $errors->has('author_id') ? 'error' : '' }}">
    <label for="first_name">Author</label>
    <select class="ui dropdown" name="author_id" value="{{ old('author_id')}}">
      <option value="">Author</option>
      @foreach($users as $user)
        @if(old('author_id') == $user->id)
              <option value="{{ $user->id }}" selected>{{($user->display_name) ?? $user->email}} [{{$user->getRoleDisplayName()}}]</option>
        @else
              <option value="{{ $user->id }}">{{($user->display_name) ?? $user->email}} [{{$user->getRoleDisplayName()}}]</option>
        @endif
      @endforeach
  </select>
  </div>

@endsection
