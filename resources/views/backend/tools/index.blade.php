@extends('layouts.backend')

@section('title', 'Tools')

@section('content')
<div class="ui segment large">
  {!! Breadcrumbs::render('backend.tools') !!}
</div><!--end of segment-->

<div class="ui segment teal padded">
  <h2>Tools</h2>
  @include('partials._success',['flashSuccess'=>'success'])

  @if(Session::has('error'))
    <div class="ui message red">
      {{Session::get('error')}}
    </div>
  @endif
  <h3>Maintenance Mode</h3>

   <form method="POST" action="{{ url('dashboard/maintenance-mode') }}">
    {{ csrf_field() }}
    <button type="submit" class="ui primary button no-wrap">
      <i class="{{($isMaintenanceModeEnabled)? 'check circle':'minus circle' }} icon"></i>
      {{ ($isMaintenanceModeEnabled)? "Disable":" Enable" }} Maintenance Mode
    </button>
  </form>

  @if(config('blogger.search_engine.enabled'))
  <h3>Reset Search Engine Index</h3>

  <form method="POST" action="{{ url('dashboard/reset-search-index') }}" class="form-search-index">
    {{ csrf_field() }}
    <button type="submit" class="ui primary button no-wrap">
      <i class="search icon"></i>
      Reset Index
    </button>
  </form>
  @endif

  <h3>Clear cache</h3>

  <form method="POST" action="{{ url('dashboard/clear-cache') }}" class="form-remove-cache">
    {{ csrf_field() }}
  	<button class="ui primary button no-wrap"><i class="remove circle icon"></i> Clear Cache</button>
  </form>
</div>
@endsection
