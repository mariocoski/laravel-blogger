@extends('layouts.backend')

@section('title')
  @if(!empty($category))
    Category - Edit
  @else
    Category - Create
  @endif
@stop

@section('content')
<div class="ui segment large">
@if(!empty($category))
  {!! Breadcrumbs::render('backend.categories.edit',$category) !!}
@else
  {!! Breadcrumbs::render('backend.categories.create') !!}
@endif
</div><!--end of segment-->

<div class="ui segment teal padded">
@if(!empty($category))
<h2>Update a Category</h2>
<form class="ui form" method="POST" action="{{url('dashboard/categories/'.$category->id)}}">
{{method_field('PUT')}}
@else
<h2>Create a Category</h2>
<form class="ui form" method="POST" action="{{url('dashboard/categories')}}">
@endif
  {{csrf_field()}}
  @include('partials._errors')
  @include('partials._success',['flashSuccess'=>'status'])

  <div class="field fluid {{ $errors->has('name') ? 'error' : '' }}">
    <label for="category-name">Name</label>
    <div class="ui input">
      <input type="text" name="name" id="category-name" placeholder="Name" value="{{  ($category->name) ?? old('name') }}" >
    </div>
  </div>

  <div class="field fluid {{ $errors->has('slug') ? 'error' : '' }}">
    <label for="category-slug">Slug</label>
    <div class="ui input">
      <input type="text" name="slug" id="category-slug" placeholder="Slug" value="{{ ($category->slug) ?? old('slug') }}" >
    </div>
  </div>

    <button class="ui fluid fluid primary submit button" type="submit" name="submit">
    @if(!empty($category))
      Update
    @else
      Create
    @endif
    Category
   </button>
</form>
</div>

@endsection
