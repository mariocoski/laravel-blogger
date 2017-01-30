@extends('layouts.auth')

@section('title', 'Remind Password')

@section('content')

<div class="ui middle aligned center aligned grid grid-auth">

  <div class="column column-auth">

    <h2 class="ui white header">
    <a href="{{ url('/') }}" class="image"><img src="{{ url('images/logo_sm.png') }}" alt="{{ config('app.name') }}"></a>
      <div class="content white">
        Remind password
      </div>
    </h2>

    <form class="ui large form" method="POST" action="{{ url('/password/email') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="ui stacked segment">
        @include('partials._errors')
        @include('partials._success',['flashSuccess'=>'status'])
        <div class="field {{ $errors->has('email') ? 'error' : '' }}">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="E-mail address" autofocus>
          </div>
        </div>
        <button class="ui fluid large primary submit button" name="submit"> Send Password Reset Link</button>
        <div class="ui "><a href="{{ url('login') }}" name="login">Reminded yourself a password?</a></div>
      </div>
    </form>

  </div>

</div>

@endsection
