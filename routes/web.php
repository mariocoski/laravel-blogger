<?php

/*
|--------------------------------------------------------------------------
| Auth routes
|--------------------------------------------------------------------------
 */

//Authentication routes
Route::auth();
Route::get('logout', 'Auth\LoginController@logout');
Route::get('password/reset/{token}/{email}', 'Auth\ResetPasswordController@showResetForm');

//OAuth2 routes
Route::get('auth/facebook', 'OAuth\FacebookController@login');
Route::get('auth/facebook/callback', "OAuth\FacebookController@callback");

Route::get('auth/twitter', 'OAuth\TwitterController@login');
Route::get('auth/twitter/callback', "OAuth\TwitterController@callback");

Route::get('auth/google', 'OAuth\GoogleController@login');
Route::get('auth/google/callback', "OAuth\GoogleController@callback");

/*
|--------------------------------------------------------------------------
| Front-end routes
|--------------------------------------------------------------------------
 */

Route::get("/", ['as' => 'home', 'uses' => 'Frontend\ArticleController@index']);

Route::get("sitemap", ['as' => 'frontend.sitemap', 'uses' => 'Frontend\HomepageController@sitemap']);
Route::get("terms-and-conditions", ['as' => 'frontend.terms-and-conditions', 'uses' => 'Frontend\HomepageController@termsAndConditions']);
Route::get("privacy-policy", ['as' => 'frontend.privacy-policy', 'uses' => 'Frontend\HomepageController@privacyPolicy']);

Route::post('subscribe', 'Frontend\HomepageController@subscribe');
Route::get('subscription/confirm/{email}', ['as' => 'frontend.subscription', 'uses' => 'Frontend\HomepageController@subscriptionConfirm']);

Route::get("categories", ['as' => 'frontend.categories', 'uses' => 'Frontend\CategoryController@index']);
Route::get("categories/{slug}", ['as' => 'frontend.categories.show', 'uses' => 'Frontend\CategoryController@show'])->where('slug', '[\w\d\-\_]+');

Route::get("tags", ['as' => 'frontend.tags', 'uses' => 'Frontend\TagController@index']);
Route::get("tags/{slug}", ['as' => 'frontend.tags.show', 'uses' => 'Frontend\TagController@show'])->where('slug', '[\w\d\-\_]+');

Route::post('contact', 'Frontend\HomepageController@contact');
Route::get('about', ['as' => 'frontend.about', 'uses' => 'Frontend\HomepageController@about']);
Route::get('about/{slug}', ['as' => 'frontend.about.author', 'uses' => 'Frontend\HomepageController@author'])->where('slug', '[\w\d\-\_]+');
Route::get('search', ['as' => 'frontend.search', 'uses' => 'Frontend\HomepageController@search']);
Route::get('blog/{slug}', ['as' => 'frontend.articles.show', 'uses' => 'Frontend\ArticleController@show'])->where('slug', '[\w\d\-\_]+');

Route::get('autocomplete', 'Frontend\HomepageController@autocomplete');

Route::post("favourites", 'Frontend\ArticleController@favourites')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Back-end routes
|--------------------------------------------------------------------------
 */

Route::group(['prefix' => 'filemanager', 'middleware' => 'role:editor'], function () {
    Route::get('show', 'FilemanagerLaravelController@getShow');
    Route::get('connectors', 'FilemanagerLaravelController@getConnectors');
    Route::post('connectors', 'FilemanagerLaravelController@postConnectors');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {

    //auth only
    Route::get('/', ['as' => 'backend.dashboard', 'uses' => 'Backend\DashboardController@index']);
    Route::get('profile', ['as' => 'backend.profile', 'uses' => 'Backend\ProfileController@edit']);
    Route::put('profile', 'Backend\ProfileController@update');

    Route::get('favourite-articles', ['as' => 'articles.favourites', 'uses' => 'Backend\ArticleController@favouriteArticles']);

    Route::get('avatar', ['as' => 'backend.avatar', 'uses' => 'Backend\AvatarController@edit']);
    Route::post('avatar', 'Backend\AvatarController@update');

    //admin only
    Route::group(['middleware' => 'role:admin'], function () {
        Route::resource('users', 'Backend\UserController');

        Route::get('tools', ['as' => 'backend.tools', 'uses' => 'Backend\ToolsController@index']);
        Route::post('clear-cache', 'Backend\ToolsController@clearCache');
        Route::post('maintenance-mode', 'Backend\ToolsController@maintenanceMode');
        Route::post('reset-search-index', 'Backend\ToolsController@resetIndex');

        Route::get('impersonate/{id}', 'Backend\ImpersonificationController@impersonate');
        Route::get('settings', ['as' => 'backend.settings', 'uses' => 'Backend\SettingsController@index']);
        Route::post('settings/update', 'Backend\SettingsController@update');
    });

    //admin and editor
    Route::group(['middleware' => 'role:editor'], function () {
        Route::resource('categories', 'Backend\CategoryController');
        Route::resource('tags', 'Backend\TagController');
        Route::resource('articles', 'Backend\ArticleController');
        Route::get('manager', 'Backend\MediaController@manager');
        Route::get('preview/{id}', 'Backend\ArticleController@preview');
    });

    Route::get('back-to-admin-mode', 'Backend\ImpersonificationController@backToAdminMode');
    Route::get('subscriptions', ['as' => 'backend.subscriptions', 'uses' => 'Backend\SubscriptionController@index']);

    Route::get('media', ['as' => 'backend.media', 'uses' => 'Backend\MediaController@index']);
});
