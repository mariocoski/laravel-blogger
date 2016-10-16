@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<div class="ui middle aligned center aligned grid grid-auth">

  <div class="column column-auth">

    <h2 class="ui white header">
    <a href="/" class="image"><img src="{{ LaravelLocalization::getNonLocalizedURL('images/logo_sm.png') }}" alt="Blogger"></a>
      <div class="content white">
        Remind password
      </div>
    </h2>
    <form class="ui large form">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="E-mail address">
          </div>
        </div>

        <div class="ui fluid large orange submit button"> Send Password Reset Link</div>

        <div class="ui "><a href="/login">Reminded yourself a password?</a></div>
        @include('partials._credits_footer')
      </div>
    </form>

  </div>

</div>

@endsection
