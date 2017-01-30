@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')

<div class="ui middle aligned center aligned grid grid-auth">

  <div class="column column-auth">

    <h2 class="ui white header">
    <a href="{{ url('/') }}" class="image"><img src="{{url('images/logo_sm.png')}}" ></a>
      <div class="content white">
        Set up a new password
      </div>
    </h2>
    <form class="ui large form" method="POST" action="{{ url('/password/reset') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="token" value="{{ $token }}">
      <div class="ui stacked segment">
        @include('partials._errors')
        @include('partials._success',['flashSuccess'=>'status'])
        <div class="field {{ $errors->has('email') ? 'error' : '' }}">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="E-mail address" value="{{ $email or old('email') }}" >
          </div>
        </div>
        <div class="field {{ $errors->has('password') ? 'error' : '' }}">
          <div class="ui input left icon action">
            <i class="lock icon"></i>
            <input type="password" name="password" class="show-new-password-field" placeholder="Password" autofocus>
            <button class="ui icon primary button show-new-password" tabindex="-1">
             <i class="eye icon"></i>
           </button>
          </div>
        </div>
        <div class="field {{ $errors->has('password') ? 'error' : '' }}">
          <div class="ui input left icon action">
            <i class="lock icon"></i>
            <input type="password"  name="password_confirmation" class="show-new-password-confirmation-field" placeholder="Password Confirmation">
            <button class="ui icon primary button show-new-password-confirmation" tabindex="-1">
             <i class="eye icon"></i>
           </button>
          </div>
        </div>
        <button type="submit" name="submit" class="ui fluid large primary submit button">Change my password</button>
        <div class="ui divider"></div>
        <div class="ui "><a href="{{ url('login') }}">Reminded yourself a password?</a></div>

      </div>
    </form>

  </div>

</div>

@endsection
