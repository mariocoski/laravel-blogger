@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<div class="ui middle aligned center aligned grid grid-auth">

  <div class="column column-auth">

    <h2 class="ui white header">
    <a href="/" class="image"><img src="images/logo_sm.png" ></a>
      <div class="content white">
        Registration
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
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class="ui fluid large orange submit button">Register</div>
        <div>By registering, you agree to the <a href="/terms">Terms of Service</a></div>
        <div class="ui divider"></div>
        <div class="ui "><a href="/login">Already have an account?</a></div>

          <!-- @include('partials._credits_footer') -->
      </div>
    </form>

  </div>

</div>

@endsection
