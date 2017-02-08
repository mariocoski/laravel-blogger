@extends('layouts.backend')

@section('title', 'Settings')

@section('content')
<div class="ui segment large">
  {!! Breadcrumbs::render('backend.settings') !!}
</div><!--end of segment-->

<div class="ui segment teal padded">
<h2>Update Settings</h2>
<form class="ui form" method="POST" action="{{url('dashboard/settings/update')}}">

  {{csrf_field()}}
  @include('partials._errors')
  @include('partials._success',['flashSuccess'=>'status'])

  <div class="field fluid {{ $errors->has('meta_title') ? 'error' : '' }}">
    <label for="meta_title">Meta Title</label>
    <div class="ui input">
      <input type="text" name="meta_title" id="meta_title" placeholder="Meta title" value="{{ ($settings['meta_title']) ?? old('meta_title')}}" autofocus>
    </div>
  </div>
   <div class="field fluid {{ $errors->has('meta_author') ? 'error' : '' }}">
    <label for="meta_author">Meta Author</label>
    <div class="ui input">
      <input type="text" name="meta_author" id="meta_author" placeholder="Meta Author" value="{{ ($settings['meta_author']) ?? old('meta_author') }}" >
    </div>
  </div>

  <div class="field fluid {{ $errors->has('meta_description') ? 'error' : '' }}">
    <label for="meta_description">Meta Description</label>
    <div class="ui input">
      <input type="text" name="meta_description" id="meta_description" placeholder="Meta Description" value="{{  ($settings['meta_description']) ?? old('meta_description') }}" >
    </div>
  </div>

   <div class="field fluid {{ $errors->has('meta_keywords') ? 'error' : '' }}">
     <label for="meta_keywords">Meta Keywords</label>
     <div class="ui multiple search selection dropdown multiple-dropdown field-prevent-send">
        <input type="hidden" name="meta_keywords" value="{{ ($settings['meta_keywords']) ?? old('meta_keywords') }}">
         <div class="default text">Meta Keywords</div>
         <div class="menu"></div>
     </div>
   </div>

    <div class="field fluid {{ $errors->has('meta_robots') ? 'error' : '' }}">
    <label for="first_name">Meta Robots</label>
     <div class="italic-description">Please select your robots settings which will be rendered as a meta tag in head section. <a href="#">Learn more</a> about this feature</div>
    <select class="ui dropdown" name="meta_robots" value="{{  ($settings['meta_robots']) ?? old('meta_robots')}}">
      <option value="">Meta Robots</option>
      @foreach($metaRobotsOptions as $option)
        <option value="{{ $option['name'] }}"
        @if(($option['name'] == $settings['meta_robots']) || old('meta_robots') == $option['name'])
               selected
        @endif
        >{{$option['value']}} </option>
      @endforeach
  </select>
  </div>

   <div class="field fluid {{ $errors->has('disqus_shortname') ? 'error' : '' }}">
    <label for="disqus_shortname">Disqus shortname</label>
    <div class="italic-description">Please enter your Disqus shortname to enable comments in your articles. <a href="#">Learn more</a> about this feature</div>
    <div class="ui input">
      <input type="text" name="disqus_shortname" id="disqus_shortname" placeholder="Disqus shortname" value="{{ ($settings['disqus_shortname']) ?? old('disqus_shortname') }}" >
    </div>
  </div>

  <div class="field fluid {{ $errors->has('google_analytics_id') ? 'error' : '' }}">
    <label for="google_analytics_id">Google Analytics Id</label>
    <div class="italic-description">Please enter your Google Analytics Id to enable tracking on your website. <a href="#">Learn more</a> about this feature</div>
    <div class="ui input">
      <input type="text" name="google_analytics_id" id="google_analytics_id" placeholder="Google Analytics Id" value="{{  ($settings['google_analytics_id']) ?? old('google_analytics_id') }}" >
    </div>
  </div>
   <button class="ui fluid fluid primary submit button" type="submit" name="submit">
      Update Settings
   </button>
</form>
</div>

@endsection
