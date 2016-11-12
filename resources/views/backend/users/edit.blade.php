@extends('layouts.backend')

@section('title', 'Page Title')

@section('content')

<h2>Create a User</h2>

<div class="ui form">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="field fluid {{ $errors->has('email') ? 'error' : '' }}">
    <label for="email">E-mail address *</label>
    <div class="ui input">
      <input type="text" name="email" id="email" placeholder="E-mail address" value="{{ (!empty($user->email))? $user->email : '' or old('email') }}" autofocus>
    </div>
  </div>

  <div class="field fluid {{ $errors->has('password') ? 'error' : '' }}">
    <label for="password">Password *</label>
    <div class="ui input action">
      <input type="password" id="password" name="password" class="show-new-password-field" placeholder="Password" >
      <button class="ui icon orange button show-new-password" tabindex="-1">
        <i class="eye icon"></i>
      </button>
    </div>
  </div>

  <div class="field fluid {{ $errors->has('password') ? 'error' : '' }}">
    <label for="password_confirmation">Password Confirmation *</label>
    <div class="ui input action">
      <input type="password" id="password_confirmation"  name="password_confirmation" class="show-new-password-confirmation-field" placeholder="Password Confirmation">
      <button class="ui icon orange button show-new-password-confirmation" tabindex="-1">
        <i class="eye icon"></i>
      </button>
    </div>
  </div>

  <label>Role:</label><div class="ui huge rating" data-rating="1" data-max-rating="3"></div>
<input type="hidden" name="rating" value="">

<?php print_r($roles[1]->display_name);?>

  <div class="field fluid {{ $errors->has('first_name') ? 'error' : '' }}">
    <label for="first_name">First Name *</label>
    <div class="ui input">
      <input type="text" name="first_name" id="first_name" placeholder="First Name" value="{{ (!empty($user->first_name))? $user->first_name : '' or old('first_name') }}" >
    </div>
  </div>

  <div class="field fluid {{ $errors->has('last_name') ? 'error' : '' }}">
    <label for="last_name">Last Name *</label>
    <div class="ui input">
      <input type="text" name="last_name" id="last_name" placeholder="Last Name" value="{{ (!empty($user->last_name))? $user->last_name : '' or old('last_name') }}" >
    </div>
  </div>

   <div class="field fluid {{ $errors->has('display_name') ? 'error' : '' }}">
    <label for="display_name">Display Name *</label>
    <div class="ui input">
      <input type="text" name="display_name" id="display_name" placeholder="Display Name" value="{{ (!empty($user->display_name))? $user->display_name : '' or old('display_name') }}" >
    </div>
  </div>

   <div class="field fluid {{ $errors->has('date_of_birth') ? 'error' : '' }}">
    <label for="date_of_birth">Date Of Birth</label>
    <div class="ui input">
      <input type="text" name="date_of_birth" class="date-only" id="date_of_birth" placeholder="Display Name" value="{{ (!empty($user->date_of_birth))? $user->date_of_birth : '' or old('date_of_birth') }}" >
    </div>
  </div>

   <div class="field fluid">
    <label for="address">Address</label>
    <div class="ui input">
      <input type="text" name="address" id="address" placeholder="Address" value="{{ (!empty($user->address))? $user->address : '' or old('address') }}" >
    </div>
  </div>

   <div class="field fluid">
    <label for="postcode">Postcode</label>
    <div class="ui input">
      <input type="text" name="postcode" id="postcode" placeholder="Postcode" value="{{ (!empty($user->postcode))? $user->postcode : '' or old('postcode') }}" >
    </div>
   </div>

   <div class="field fluid">
    <label for="town">Town</label>
    <div class="ui input">
      <input type="text" name="town" id="town" placeholder="Town" value="{{ (!empty($user->town))? $user->town : '' or old('town') }}" >
    </div>
   </div>

   <div class="field fluid">
    <label for="country">Country</label>
    <div class="ui input">
      <input type="text" name="country" id="country" placeholder="Country" value="{{ (!empty($user->country))? $user->country : '' or old('country') }}" >
    </div>
   </div>

    <div class="field fluid">
    <label for="phone">Phone</label>
    <div class="ui input">
      <input type="text" name="phone" id="phone" placeholder="Phone" value="{{ (!empty($user->phone))? $user->phone : '' or old('phone') }}" >
    </div>
   </div>

   <div class="field fluid">
    <label for="job">Job</label>
    <div class="ui input">
      <input type="text" name="job" id="job" placeholder="Job" value="{{ (!empty($user->job))? $user->job : '' or old('job') }}" >
    </div>
   </div>

    <div class="field fluid">
    <label for="bio">Bio</label>
    <textarea rows="2" id="bio" name="bio" placeholder="Bio">{{(!empty($user->bio))? $user-bio : '' or old('bio')}}</textarea>
    </div>

    <div class="field fluid">
    <label for="job">Facebook Name</label>
    <div class="ui input">
      <input type="text" name="facebook_name" id="facebook_name" placeholder="Facebook Name" value="{{ (!empty($user->facebook_name))? $user->facebook_name : '' or old('facebook_name') }}" >
    </div>
   </div>

    <div class="field fluid">
    <label for="job">Twitter Name</label>
    <div class="ui input">
      <input type="text" name="twitter_name" id="twitter_name" placeholder="Twitter Name" value="{{ (!empty($user->twitter_name))? $user->twitter_name : '' or old('twitter_name') }}" >
    </div>
   </div>

   <div class="field fluid">
    <label for="job">LinkedIn Name</label>
    <div class="ui input">
      <input type="text" name="linked_in_name" id="linked_in_name" placeholder="LinkedIn Name" value="{{ (!empty($user->linked_in_name))? $user->linked_in_name : '' or old('linked_in_name') }}" >
    </div>
   </div>

    <div class="field fluid">
    <label for="job">Github Name</label>
    <div class="ui input">
      <input type="text" name="github_name" id="github_name" placeholder="Github Name" value="{{ (!empty($user->github_name))? $user->github_name : '' or old('github_name') }}" >
    </div>
   </div>

   <div class="field fluid">
    <label for="job">Website Url</label>
    <div class="ui input">
      <input type="text" name="website_url" id="website_url" placeholder="Website Url" value="{{ (!empty($user->website_url))? $user->website_url : '' or old('website_url') }}" >
    </div>
   </div>

</div>


@endsection
