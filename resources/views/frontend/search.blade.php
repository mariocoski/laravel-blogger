@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
<div class="ui grid grid-with-margin">
  <div class="ui container">
    <div class="column">
      <form class="search-form-sm" action="{{ LaravelLocalization::getLocalizedURL(null, trans('routes.search'))}}">

          <div class="ui search fluid">
            <div class="ui icon input">
              <input class="prompt" type="text" name="q" value="{{Request::input('q')}}" placeholder="Search...">
              <i class="search icon"></i>
            </div>
            <div class="results"></div>
          </div>

      </form>

    </div><!--end of column-->
  </div><!--end of container-->
</div><!--end of grid stackable-->
@endsection
