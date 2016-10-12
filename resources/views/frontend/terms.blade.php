@extends('layouts.app)

@section('title', 'Page Title')


@section('content')

<div class="ui stackable equal width grid">
  <div class="column">
<h1>Contact!!!</h1>
<h1>Contact!!!</h1><h1>Contact!!!</h1><h1>Contact!!!</h1><h1>Contact!!!</h1>
<h1> Locale - {{ LaravelLocalization::getCurrentLocale() }}</h1>
    <ul class="language_bar_chooser">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                {{ $properties['native'] }}
            </a>
        </li>
    @endforeach
</ul>
