<?php
use Illuminate\Http\Request;

Route::get('autocomplete','Frontend\HomepageController@autocomplete');

Route::group([
       'prefix' => LaravelLocalization::setLocale(),
       'middleware' => [ 'localize','localeSessionRedirect', 'localizationRedirect' ]
     ], function(){
/*
|--------------------------------------------------------------------------
| Auth routes
|--------------------------------------------------------------------------
*/
//Authentication routes
Route::get(LaravelLocalization::transRoute('routes.login'), 'Auth\LoginController@showLoginForm');
Route::post(LaravelLocalization::transRoute('routes.login'), 'Auth\LoginController@login');
Route::post(LaravelLocalization::transRoute('routes.logout'), 'Auth\LoginController@logout');

//Registration routes
Route::get(LaravelLocalization::transRoute('routes.register'), 'Auth\RegisterController@showRegistrationForm');
Route::post(LaravelLocalization::transRoute('routes.register'), 'Auth\RegisterController@register');

//Password reset routes
Route::get(LaravelLocalization::transRoute('routes.password_reset'), 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post(LaravelLocalization::transRoute('routes.password_email'),  'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get(LaravelLocalization::transRoute('routes.password_reset_token'), 'Auth\ResetPasswordController@showResetForm');
Route::post(LaravelLocalization::transRoute('routes.password_reset'), 'Auth\ResetPasswordController@reset');

/*
|--------------------------------------------------------------------------
| Front-end routes
|--------------------------------------------------------------------------
*/

Route::get("/", 'Frontend\HomepageController@index');
Route::get(LaravelLocalization::transRoute('routes.contact'),'Frontend\HomepageController@contact');
Route::get(LaravelLocalization::transRoute('routes.about'),'Frontend\HomepageController@about');
Route::get(LaravelLocalization::transRoute('routes.search'),'Frontend\HomepageController@search');


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


});
