@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<div class="ui middle aligned center aligned grid grid-auth">

  <div class="column column-auth">

    <h2 class="ui white header">
    <a href="/" class="image"><img src="../images/logo_sm.png" alt="Blogger"></a>
      <div class="content white">
        Remind password
      </div>
    </h2>

    <form class="ui large form" method="POST" action="{{ url('/password/email') }}">
      {{ csrf_field() }}
      <div class="ui stacked segment">
        @include('partials._errors')
        @include('partials._success',['$flashSuccess'=>'success'])
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="E-mail address">
          </div>
        </div>

        <button class="ui fluid large orange submit button" name="submit"> Send Password Reset Link</button>
        <div class="ui "><a href="/login" name="login">Reminded yourself a password?</a></div>
      </div>
    </form>

  </div>

</div>

@endsection
