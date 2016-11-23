@extends('layouts.backend')

@section('title', 'Page Title')

@section('content')

<h2>Update Settings</h2>
<form class="ui form" method="POST" action="{{url('dashboard/settings)}}">


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

   <div class="field fluid {{ $errors->has('date_of_birth') ? 'error' : '' }}">
    <label for="date_of_birth">Date Of Birth (optional)</label>
    <div class="ui input">
      <input type="text" name="date_of_birth" class="date-of-birth" id="date_of_birth" placeholder="YYYY-MM-DD" value="{{ ($user->date_of_birth) ?? old('date_of_birth') }}" >
    </div>
  </div>
   <div class="field fluid">
    <label for="address">Address (optional)</label>
    <div class="ui input">
      <input type="text" name="address" id="address" placeholder="Address" value="{{ ($user->address) ?? old('address') }}" >
    </div>
  </div>

   <div class="field fluid">
    <label for="postcode">Postcode (optional)</label>
    <div class="ui input">
      <input type="text" name="postcode" id="postcode" placeholder="Postcode" value="{{ ($user->postcode) ?? old('postcode') }}" >
    </div>
   </div>

   <div class="field fluid">
    <label for="town">Town (optional)</label>
    <div class="ui input">
      <input type="text" name="town" id="town" placeholder="Town" value="{{ ($user->town) ?? old('town') }}" >
    </div>
   </div>

   <div class="field fluid">
    <label for="country">Country (optional)</label>
    <div class="ui input">
      <input type="text" name="country" id="country" placeholder="Country" value="{{($user->country) ??  old('country') }}" >
    </div>
   </div>

    <div class="field fluid">
    <label for="phone">Phone (optional)</label>
    <div class="ui input">
      <input type="text" name="phone" id="phone" placeholder="Phone" value="{{($user->phone) ?? old('phone') }}" >
    </div>
   </div>

   <div class="field fluid">
    <label for="job">Job (optional)</label>
    <div class="ui input">
      <input type="text" name="job" id="job" placeholder="Job" value="{{ ($user->job) ?? old('job') }}" >
    </div>
   </div>

    <div class="field fluid">
    <label for="bio">Bio (optional)</label>
    <textarea rows="2" id="bio" name="bio" placeholder="Bio">{{ ($user->bio) ?? old('bio')}}</textarea>
    </div>

    <div class="field fluid">
    <label for="facebook_name">Facebook Name (optional)</label>
    <div class="ui input">
      <input type="text" name="facebook_name" id="facebook_name" placeholder="Facebook Name" value="{{($user->facebook_name) ??  old('facebook_name') }}" >
    </div>
   </div>

    <div class="field fluid">
    <label for="twitter_name">Twitter Name (optional)</label>
    <div class="ui input">
      <input type="text" name="twitter_name" id="twitter_name" placeholder="Twitter Name" value="{{ ($user->twitter_name) ?? old('twitter_name') }}" >
    </div>
   </div>

   <div class="field fluid">
    <label for="linked_in_name">LinkedIn Name (optional)</label>
    <div class="ui input">
      <input type="text" name="linked_in_name" id="linked_in_name" placeholder="LinkedIn Name" value="{{ ($user->linked_in_name) ?? old('linked_in_name') }}" >
    </div>
   </div>

    <div class="field fluid">
    <label for="github_name">Github Name (optional)</label>
    <div class="ui input">
      <input type="text" name="github_name" id="github_name" placeholder="Github Name" value="{{($user->github_name) ??  old('github_name') }}" >
    </div>
   </div>

   <div class="field fluid">
    <label for="website_url">Website Url (optional)</label>
    <div class="ui input">
      <input type="text" name="website_url" id="website_url" placeholder="www.example.com" value="{{ ($user->website_url) ?? old('website_url') }}" >
    </div>
   </div>
   <button class="ui fluid fluid orange submit button" type="submit" name="submit">
      Update Settings
   </button>
</form>


@endsection
