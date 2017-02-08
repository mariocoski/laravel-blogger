@extends('layouts.backend')

@section('title')
  @if(!empty($article))
    Article - Edit
  @else
    Article - Create
  @endif
@stop

@section('content')

<div class="ui segment large">
@if(!empty($article))
  {!! Breadcrumbs::render('backend.articles.edit',$article) !!}
@else
  {!! Breadcrumbs::render('backend.articles.create') !!}
@endif
</div><!--end of segment-->

<div class="ui segment teal padded">
@if(!empty($article))
<h2>Update an Article
  &nbsp;
  <a class="ui right floated tiny primary labeled icon button" href="{{url('dashboard/preview/'.$article->id)}}">
      <i class="eye icon"></i> Preview Article
  </a>
</h2>
<form class="ui form" method="POST" action="{{url('dashboard/articles/'.$article->id)}}">
{{method_field('PUT')}}
@else
<h2>Create an Article</h2>
<form class="ui form" method="POST" action="{{url('dashboard/articles')}}">
@endif
  {{csrf_field()}}
  @include('partials._errors')
  @include('partials._success',['flashSuccess'=>'status'])

  <div class="field fluid {{ $errors->has('title') ? 'error' : '' }}">
    <label for="article-title">Title</label>
    <div class="ui input">
      <input type="text" name="title" id="article-title" placeholder="Title" value="{{  ($article->title) ?? old('title') }}" >
    </div>
  </div>

  <div class="field fluid {{ $errors->has('subtitle') ? 'error' : '' }}">
    <label for="article-subtitle">Subtitle</label>
    <div class="ui input">
      <input type="text" name="subtitle" id="article-subtitle" placeholder="Subtitle" value="{{  ($article->subtitle) ?? old('subtitle') }}" >
    </div>
  </div>

  <div class="field fluid {{ $errors->has('slug') ? 'error' : '' }}">
    <label for="article-slug">Slug</label>
    <div class="ui input">
      <input type="text" name="slug" id="article-slug" placeholder="Slug" value="{{ ($article->slug) ?? old('slug') }}" >
    </div>
  </div>

  <div class="field fluid {{ $errors->has('category') ? 'error' : '' }}">
    <label>Category</label>
    <select class="ui dropdown" name="category" value="{{ old('category')}}">
      <option value="">Category</option>
      @if(isset($categories))
        @foreach($categories as $category)
          @if((!empty($article) && $article->category->id == $category->id) || old('category') == $category->id)
                <option value="{{ $category->id }}" selected>{{$category->name}} </option>
          @else
                <option value="{{ $category->id }}">{{$category->name}} </option>
          @endif
        @endforeach
      @endif
    </select>
  </div>

  <div class="field fluid {{ $errors->has('author_id') ? 'error' : '' }}">
    <label for="author_id">Author</label>
    <select class="ui dropdown" name="author_id" id="author_id" value="{{ old('author_id')}}">
      <option value="">Author</option>
      @if(isset($categories))
        @foreach($users as $user)
          @if((!empty($article) && $article->author_id == $user->id) || old('author_id') == $user->id || $user->id == Auth::user()->id)
            <option value="{{ $user->id }}" selected>{{ ($user->display_name) ?? $user->email}} </option>
          @else
            <option value="{{ $user->id }}">{{ ($user->display_name) ?? $user->email}}</option>
          @endif
        @endforeach
      @endif
    </select>
  </div>

   <div class="field fluid {{ $errors->has('tags') ? 'error' : '' }}">
     <label for="tags">Tags</label>
     <div class="ui multiple selection dropdown multiple-dropdown field-prevent-send">
        <input type="hidden" name="tags" id="tags" value="{{ ($article->associated_tags) ?? old('tags') }}">
         <div class="default text">Tags</div>
         <div class="menu">
          @if(isset($tags) && count($tags))
            @foreach($tags as $tag)
              <div class="item" data-value="{{$tag->id}}">{{$tag->name}}</div>
            @endforeach
          @endif
         </div>
     </div>
   </div>


   <div class="field">
     <label for="article-image">Article Image</label>
     <div class="ui left action input">
      <button class="ui teal labeled icon button" id="article-pick-image">
        <i class="image icon"></i>
        Pick Image
      </button>
      <input type="text" name="article_image" id="article-image-path" value="{{($article->article_image) ?? old('article_image') }}" placeholder="relative image url">
    </div>

   <div class="ui segment left floated segment-margin">
     <div class="ui medium bordered image">
        <img id="article-image-preview" src="{{ (isset($article) && $article->article_image)? url(config('blogger.filemanager.upload_path').'/'.$article->article_image): "" }}">
      </div>
     </div>
   </div>


  <div class="field {{ $errors->has('content') ? 'error' : '' }}">
    <label for="article-content">Content</label>
    <textarea id="article-content" name="content">{{ ($article->content) ?? old('content') }}</textarea>
  </div>

    <div class="field fluid {{ $errors->has('meta_description') ? 'error' : '' }}">
    <label for="meta_description">Meta Description</label>
    <div class="ui input">
      <input type="text" name="meta_description" id="meta_description" placeholder="Meta Description" value="{{($article->meta_description) ?? old('meta_description') }}" >
    </div>
  </div>

   <div class="field fluid {{ $errors->has('meta_keywords') ? 'error' : '' }}">
     <label for="meta_keywords">Meta Keywords</label>
     <div class="ui multiple search selection dropdown multiple-dropdown field-prevent-send">
        <input type="hidden" name="meta_keywords" value="{{ ($article->meta_keywords) ?? old('meta_keywords') }}">
         <div class="default text">Meta Keywords</div>
         <div class="menu"></div>
     </div>
   </div>

  <div class="field">
  <label for="is_published">Is published</label>
    <div class="ui left floated compact segment segment-margin">
      <div class="ui fitted toggle checkbox">
        <input type="checkbox" name="is_published" value="1" {{ (isset($article) && $article->is_published === 1 || old('is_published')) ? 'checked' : '' }}>
      </div>
   </div>
  </div>

  <div class="field fluid {{ $errors->has('published_at') ? 'error' : '' }}">
    <label for="published_at">Published at</label>
    <div class="ui input">
      <input type="text" name="published_at" class="published-at" id="published_at" placeholder="YYYY-MM-DD H:i:s" value="{{ ($article->published_at) ?? old('published_at') }}" >
    </div>
  </div>


    <button class="ui fluid fluid primary submit button" type="submit" name="submit">
    @if(!empty($article))
      Update
    @else
      Create
    @endif
    Article
   </button>
</form>
</div><!--end of segment-->

@endsection

@section('scripts')
   @include('partials._filemanager_scripts')
@stop
