@extends('layouts.backend')

@section('title')
  @if(!empty($user))
    User - Edit
  @else
    User - Create
  @endif
@stop

@section('content')
<div class="ui segment large">
@if(!empty($user))
  {!! Breadcrumbs::render('backend.users.edit',$user) !!}
@else
  {!! Breadcrumbs::render('backend.users.create') !!}
@endif
</div><!--end of segment-->

<div class="ui segment teal padded">
@if(!empty($user))
<h2>Update a User</h2>
<form class="ui form" method="POST" action="{{url('dashboard/users/'.$user->id)}}">
{{method_field('PUT')}}
@else
<h2>Create a User</h2>
<form class="ui form" method="POST" action="{{url('dashboard/users')}}">
@endif
  {{csrf_field()}}
  @include('partials._errors')
  @include('partials._success',['flashSuccess'=>'status'])
  <div class="field fluid {{ $errors->has('email') ? 'error' : '' }}">
    <label for="email">E-mail address</label>
    <div class="ui input">
      <input type="text" name="email" id="email" placeholder="E-mail address" value="{{ ($user->email) ?? old('email')}}" autofocus>
    </div>
  </div>

  <div class="field fluid {{ $errors->has('password') ? 'error' : '' }}">
    <label for="password">Password</label>
    <div class="ui input action">
      <input type="password" id="password" name="password" class="show-new-password-field" placeholder="Password" >
      <button class="ui icon primary button show-new-password" tabindex="-1">
        <i class="eye icon"></i>
      </button>
    </div>
  </div>

  <div class="field fluid {{ $errors->has('password') ? 'error' : '' }}">
    <label for="password_confirmation">Password Confirmation</label>
    <div class="ui input action">
      <input type="password" id="password_confirmation"  name="password_confirmation" class="show-new-password-confirmation-field" placeholder="Password Confirmation">
      <button class="ui icon primary button show-new-password-confirmation" tabindex="-1">
        <i class="eye icon"></i>
      </button>
    </div>
  </div>

  <div class="field fluid {{ $errors->has('role') ? 'error' : '' }}">
    <label for="first_name">Role</label>
    <select class="ui dropdown" name="role" value="{{ old('role')}}">
      <option value="">Role</option>
      @foreach($roles as $role)
        @if((!empty($user) && $user->getTheHighestRoleId() == $role->id) || old('role') == $role->id)
              <option value="{{ $role->id }}" selected>{{$role->display_name}} [{{$role->description}}] </option>
        @else
              <option value="{{ $role->id }}">{{$role->display_name}} [{{$role->description}}]</option>
        @endif
      @endforeach
  </select>
  </div>
  <div class="field fluid {{ $errors->has('first_name') ? 'error' : '' }}">
    <label for="first_name">First Name</label>
    <div class="ui input">
      <input type="text" name="first_name" id="first_name" placeholder="First Name" value="{{  ($user->first_name) ?? old('first_name') }}" >
    </div>
  </div>

  <div class="field fluid {{ $errors->has('last_name') ? 'error' : '' }}">
    <label for="last_name">Last Name</label>
    <div class="ui input">
      <input type="text" name="last_name" id="last_name" placeholder="Last Name" value="{{ ($user->last_name) ?? old('last_name') }}" >
    </div>
  </div>

   <div class="field fluid {{ $errors->has('display_name') ? 'error' : '' }}">
    <label for="display_name">Display Name</label>
    <div class="ui input">
      <input type="text" name="display_name" id="display_name" placeholder="Display Name" value="{{ ($user->display_name) ?? old('display_name') }}" >
    </div>
  </div>

  <div class="field fluid {{ $errors->has('slug') ? 'error' : '' }}">
    <label for="slug">Slug</label>
    <div class="ui input">
      <input type="text" name="slug" id="slug" placeholder="Slug" value="{{ ($user->slug) ?? str_slug(old('slug')) }}" >
    </div>
  </div>

  <div class="field fluid {{ $errors->has('date_of_birth') ? 'error' : '' }}">
    <label for="date_of_birth">Date Of Birth (optional)</label>
    <div class="ui input">
      <input type="text" name="date_of_birth" class="date-of-birth" data-allow-input="true"  id="date_of_birth" placeholder="YYYY-MM-DD" value="{{ ($user->date_of_birth) ?? old('date_of_birth') }}" >
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
      <input type="text" name="website_url" id="website_url" placeholder="http://www.example.com" value="{{ ($user->website_url) ?? old('website_url') }}" >
    </div>
   </div>
    <input type="hidden" value="{{(!empty($user)? $user->id:"")}}" name="id">

   <button class="ui fluid fluid primary submit button" type="submit" name="submit">
    @if(!empty($user))
      Update
    @else
      Create
    @endif
    User
   </button>
</form>
</div>

@endsection
