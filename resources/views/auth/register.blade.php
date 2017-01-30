@extends('layouts.auth')

@section('title', 'Register')

@section('content')

<div class="ui middle aligned center aligned grid grid-auth">
  <div class="column column-auth">
    <h2 class="ui white header">
    <a href="{{ url('/') }}" class="image"><img src="{{ url('images/logo_sm.png') }}"></a>
      <div class="content white">
        Registration
      </div>
    </h2>
    <form class="ui large form" method="POST" action="{{ url('register') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="ui stacked segment">
        @include('partials._errors')
        <div class="field {{ $errors->has('email') ? 'error' : '' }}">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="E-mail address" value="{{ old('email') }}" autofocus>
          </div>
        </div>
        <div class="field {{ $errors->has('password') ? 'error' : '' }}">
          <div class="ui input left icon action">
            <i class="lock icon"></i>
            <input type="password" name="password" class="show-password-field" placeholder="Password">
            <button class="ui icon primary button show-password" tabindex="-1" >
             <i class="eye icon"></i>
           </button>
          </div>
        </div>
        <button type="submit" class="ui fluid large primary button" name="submit">Register</button>
        <div>By registering, you agree to the <a href="{{ url('terms-and-conditions') }}">Terms of Service</a></div>
        <div class="ui divider"></div>
        <div class="ui "><a href="{{ url('login') }}">Already have an account?</a></div>
      </div>
    </form>
  </div>
</div>

@endsection
