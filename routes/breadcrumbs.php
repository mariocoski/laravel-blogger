<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

// FRONTEND

//Article
Breadcrumbs::register('frontend.articles.show', function ($breadcrumbs, $article) {
    $breadcrumbs->parent('home', route('home'));
    $breadcrumbs->push($article->title, route('frontend.articles.show', $article));
});

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

//BACKEND

//Dashboard
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('backend.dashboard'));
});

// Articles
Breadcrumbs::register('backend.articles.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Articles', route('articles.index'));
});

// Articles > Favourites
Breadcrumbs::register('backend.articles.favourites', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Favoutite articless', route('articles.favourites'));
});

// Articles > Create Article
Breadcrumbs::register('backend.articles.create', function ($breadcrumbs) {
    $breadcrumbs->parent('backend.articles.index');
    $breadcrumbs->push('Create', route('articles.create'));
});

// Articles > [Article Name]
Breadcrumbs::register('backend.articles.show', function ($breadcrumbs, $article) {
    $breadcrumbs->parent('backend.articles.index');
    $breadcrumbs->push($article->id, route('articles.show', $article->id));
});

// Articles > [Article Name] > Edit Article
Breadcrumbs::register('backend.articles.edit', function ($breadcrumbs, $article) {
    $breadcrumbs->parent('backend.articles.show', $article);
    $breadcrumbs->push('Edit', route('articles.edit', $article->id));
});

// Categories
Breadcrumbs::register('backend.categories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Categories', route('categories.index'));
});

// Categories > Create Category
Breadcrumbs::register('backend.categories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('backend.categories.index');
    $breadcrumbs->push('Create', route('categories.create'));
});

// Categories > [Category Name]
Breadcrumbs::register('backend.categories.show', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('backend.categories.index');
    $breadcrumbs->push($category->id, route('categories.show', $category->id));
});

// Categories > [Category Name] > Edit Category
Breadcrumbs::register('backend.categories.edit', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('backend.categories.show', $category);
    $breadcrumbs->push('Edit', route('categories.edit', $category->id));
});

// Users
Breadcrumbs::register('backend.users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Users', route('users.index'));
});

// Users > Create User
Breadcrumbs::register('backend.users.create', function ($breadcrumbs) {
    $breadcrumbs->parent('backend.users.index');
    $breadcrumbs->push('Create', route('users.create'));
});

// Users > [User Name]
Breadcrumbs::register('backend.users.show', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('backend.users.index');
    $breadcrumbs->push($user->id, route('users.show', $user->id));
});

// Users > [User Name] > Edit User
Breadcrumbs::register('backend.users.edit', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('backend.users.show', $user);
    $breadcrumbs->push('Edit', route('users.edit', $user->id));
});

// Tags
Breadcrumbs::register('backend.tags.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Tags', route('tags.index'));
});

// Tags > Create Tag
Breadcrumbs::register('backend.tags.create', function ($breadcrumbs) {
    $breadcrumbs->parent('backend.tags.index');
    $breadcrumbs->push('Create', route('tags.create'));
});

// Tags > [Tag Name]
Breadcrumbs::register('backend.tags.show', function ($breadcrumbs, $tag) {
    $breadcrumbs->parent('backend.tags.index');
    $breadcrumbs->push($tag->id, route('tags.show', $tag->id));
});

// Tags > [Tag Name] > Edit Tag
Breadcrumbs::register('backend.tags.edit', function ($breadcrumbs, $tag) {
    $breadcrumbs->parent('backend.tags.show', $tag);
    $breadcrumbs->push('Edit', route('tags.edit', $tag->id));
});

// Settings
Breadcrumbs::register('backend.settings', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Settings', route('backend.settings'));
});

// Tools
Breadcrumbs::register('backend.tools', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Tools', route('backend.tools'));
});

// Subscriptions
Breadcrumbs::register('backend.subscriptions', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Subscriptions', route('backend.subscriptions'));
});

// Profile
Breadcrumbs::register('backend.profile', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Profile', route('backend.profile'));
});

// Media
Breadcrumbs::register('backend.media', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Media', route('backend.media'));
});

// Help
Breadcrumbs::register('backend.help', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Help', route('backend.help'));
});

// Avatar
Breadcrumbs::register('backend.avatar', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Avatar', route('backend.avatar'));
});
