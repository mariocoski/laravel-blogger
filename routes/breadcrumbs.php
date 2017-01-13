<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

// Frontend

// Categories
Breadcrumbs::register('frontend.categories', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
    $breadcrumbs->push('Categories', route('frontend.categories'));
});

Breadcrumbs::register('frontend.categories.show', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('frontend.categories');
    $breadcrumbs->push($category->name, route('frontend.categories.show', $category->slug));
});

// Tags
Breadcrumbs::register('frontend.tags', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
    $breadcrumbs->push('Tags', route('frontend.tags'));
});

Breadcrumbs::register('frontend.tags.show', function ($breadcrumbs, $tag) {
    $breadcrumbs->parent('frontend.tags');
    $breadcrumbs->push($tag->name, route('frontend.tags.show', $tag->slug));
});

//About`
Breadcrumbs::register('frontend.about', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
    $breadcrumbs->push('About', route('frontend.about'));
});

//Search
Breadcrumbs::register('frontend.search', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
    $breadcrumbs->push('Search', route('frontend.search'));
});

//Article
Breadcrumbs::register('frontend.articles.show', function ($breadcrumbs, $article) {
    $breadcrumbs->parent('home', route('home'));
    $breadcrumbs->push($article->title, route('frontend.articles.show', $article));
});
