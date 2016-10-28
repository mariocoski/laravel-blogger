<?php

Route::get('autocomplete','Frontend\HomepageController@autocomplete');

/*
|--------------------------------------------------------------------------
| Auth routes
|--------------------------------------------------------------------------
*/
//Authentication routes
Route::auth();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset/{token}/{email}','Auth\ResetPasswordController@showResetForm');


/*
|--------------------------------------------------------------------------
| Front-end routes
|--------------------------------------------------------------------------
*/

Route::get("/", 'Frontend\HomepageController@index');
Route::get('contact','Frontend\HomepageController@contact');
Route::get('about','Frontend\HomepageController@about');
Route::get('search','Frontend\HomepageController@search');


//       Route::get(LaravelLocalization::transRoute('routes.login'),'Auth\LoginController@showLoginForm');
//       Route::get(LaravelLocalization::transRoute('routes.articles'),function($slug){
//         return $slug;
//       });
//             Route::get(LaravelLocalization::transRoute('routes.about'),function(){
//                 return View::make('about');
//             });
//             Route::get(LaravelLocalization::transRoute('routes.view'),function($id){
//                 return View::make('view',['id'=>$id]);
//             });
//
//     //  Route::get('/{login}/','Auth\LoginController@showLoginForm')->where('login', trans('routes.auth.login.url'));
//
//       Route::get('/', function () {
//           return view('welcome');
//       });
//       // Auth::routes();
//
//       Route::get('/{articles}/{slug}', function ($slug) {
//           return "Artykul ".$slug;
//       })->where('articles', trans('routes.blog.articles.url'));;
//
// Route::get('/terms','Frontend\HomeController@terms');
// Route::get('/home', 'HomeController@index');


/*
|--------------------------------------------------------------------------
| Back-end routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware'=>['auth']],function(){
  Route::get('dashboard','Backend\DashboardController@index');
});
