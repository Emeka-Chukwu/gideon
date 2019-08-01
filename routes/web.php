<?php

use App\Http\Middleware\AdminAuthentication;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
  
});
// Route::get('/hello', function () {
//     // return view('welcome');
//     return '<h1 align="center">Hello World</h1>';
//  });

// Route::get('/about', function () {

//     return view('pages.about');
// });

// Route::get('/users/{id}', function ($id) {

//     return 'this is user '.$id; 
// });





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','PagesController@index');
Route::get('/about','PagesController@about');
Route::get('/contact','PagesController@contact');
Route::get('/services','PagesController@services');
Route::get('/events','PagesController@events');
Route::post('/contact/message', 'emailsController@SendMailNow');
Route::resource('events','EventController',['except' =>['index']]);
Route::post('/subscribe','PagesController@subscribe');



Route::resource('articles','ArticlesController',['except' => ['show']]);
// Route::resource('articles','ArticlesController',['only' => ['show']]);
Route::get('articles/{urlnum}/{slug}/{number}', 'ArticlesController@show');
Route::get('articles/search', 'ArticlesController@search');
// Route::post('articles/search', 'ArticlesController@search');
// ->where('title','[\w\d-\_]+');
// ->name('articles.show');
// Route::resource('comments','CommentsController');
// Route::resource('categories', 'CategoriesController');
// Route::resource('categories','CategoriesController');
// Route::resource('PagesController','PController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/comment/store', 'CommentsController@store')->name('comments.add');
Route::post('/reply/store', 'CommentsController@replyStore')->name('reply.add');
// Route::post('/comment/update', 'CommentsController@update')->name('comments.update');
Route::put('/reply/update', 'CommentsController@replyUpdate')->name('reply.update');
Route::resource('comment','CommentsController',[ 'only' =>['update','destroy', 'replyUpdate', 'replyDestroy']]);
// Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@show'])->where('slug', '[\w\d\-\_]+');
// Route::resource('tags', 'TagController', ['except' => ['create']]);

// Route::get('/users/{id}/{name}', function ($id, $name) {

    //     return 'this is user '.$name. ' with an id of '.$id;
    
    // });

    Route::group(['prefix' => 'admin', 'middleware' => AdminAuthentication::class], function() 
        {  
            // Route::resource('Category', 'CategoryController'); 
            // Route::resource('List', 'ListController');
            // Route::resource('Product', 'ProductController'); 
            // Route::resource('user', 'UserController');
           
            
            Route::resource('adminusers', 'Admin\UserMembersController');
            Route::resource('adminarticles', 'Admin\ArticlesAdminController');
            Route::resource('admintags','Admin\TagsController');
            Route::get('/categories/all','CategoriesController@adminall');
            Route::resource('categories', 'CategoriesController');
            Route::get('/emails/subscribers/create','PagesController@SubscribersView'); 
            Route::post('emails/subscriber/sending','emailsController@SubscribersMessage');
          
        });

    Route::get('/article/cv', function(){
        return view('articles.checkview');
    });

    // Route::resource('adminusers', 'Admin\UserMembersController');
    // Route::resource('adminarticles', 'Admin\ArticlesAdminController');
    // Route::resource('admintags','Admin\TagsController');

    