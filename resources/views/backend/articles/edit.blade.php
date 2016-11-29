@extends('layouts.backend')

@section('title', 'Page Title')

@section('content')

@if(!empty($article))
<h2>Update an Article</h2>
<form class="ui form" method="POST" action="{{url('dashboard/categories/'.$article->id)}}">
{{method_field('PUT')}}
@else
<h2>Create an Article</h2>
<form class="ui form" method="POST" action="{{url('dashboard/categories')}}">
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
          @if((!empty($article) && $article->category->id == $category->id) || old('category') == $article->category->id)
                <option value="{{ $category->id }}" selected>{{$category->name}} </option>
          @else
                <option value="{{ $category->id }}">{{$category->name}} </option>
          @endif
        @endforeach
      @endif
    </select>
  </div>

  <div class="field fluid {{ $errors->has('author_id') ? 'error' : '' }}">
    <label>Author</label>
    <select class="ui dropdown" name="author_id" value="{{ old('author_id')}}">
      <option value="">Author</option>
      @if(isset($categories))
        @foreach($users as $user)
          @if((!empty($article) && $article->author_id == $user->id) || old('author_id') == $article->author_id)
            <option value="{{ $user->id }}" selected>{{ ($user->display_name) ?? $user->email}} </option>
          @else
            <option value="{{ $user->id }}">{{ ($user->display_name) ?? $user->email}}</option>
          @endif
        @endforeach
      @endif
    </select>
  </div>

  <div class="field fluid {{ $errors->has('published_at') ? 'error' : '' }}">
    <label for="published_at">Published at</label>
    <div class="ui input">
      <input type="text" name="published_at" class="published-at" id="published_at" placeholder="YYYY-MM-DD H:i:s" value="{{ ($user->published_at) ?? old('published_at') }}" >
    </div>
  </div>


  <!--
   'author_id' => $factory->create(App\Models\User::class)->id,
        'category_id' => $factory->create(App\Models\Category::class)->id,
        'title' => $title = $faker->sentence,
        'slug' => str_slug($title),
        'subtitle' => $faker->sentence,
        'content' => $faker->paragraph,
        'raw_content' => $faker->paragraph,
        'article_image' => 'fox_unsplash.jpeg',
        'meta_keywords' => $faker->sentence,
        'meta_description' => $faker->sentence,
        'is_published' => true,
        'published_at' => date('Y-m-d H:i:s'),
-->

    <button class="ui fluid fluid orange submit button" type="submit" name="submit">
    @if(!empty($article))
      Update
    @else
      Create
    @endif
    Article
   </button>
</form>


@endsection
