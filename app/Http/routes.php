<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
 return view('welcome');
});*/
Route::get('/', 'ProductsController@getProductAll');




Route::auth();
Route::any('/find', [ 'as' => 'find', 'uses' => 'ProductsController@findProduct' ]);
Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index' ]);
Route::get('/register-company', 'Auth\AuthController@registerCompany');
Route::post('/register_company', 'Auth\AuthController@registerCompany');
Route::post('/register-aditiona-info', 'Auth\AuthController@registerAditional');
Route::get('/register-c', 'Auth\AuthController@registerC');
Route::any('/get-product-list', 'ProductsController@getProductList');
Route::any('/products/destroy-check', 'ProductsController@destroyCheck');
Route::any('/products/create-by-category', 'ProductsController@createByCategory');
Route::any('/products-category', ['as' => 'products-category', 'uses' => 'ProductsController@storeCategory']);
Route::get('/get-product-paginate', ['as' => 'get-product-paginate', 'uses' => 'ProductsController@productPaginate']);











Route::get('/get-city-by-region/{id}', 'LocationController@getCityByRegion');


Route::get('/product-editor/{id}', 'ProductsController@productEditor');
Route::post('/products/edit-categoty', 'ProductsController@editCategory');
Route::get('/single-product/{id}', 'ProductsController@singleProduct');



//Route::get('/register', 'Auth\AuthController@registerUser');


Route::group(['middleware' => ['web']], function () {
	Route::resource('company', 'CompanyController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('products', 'ProductsController');
    Route::get('/products/create/{company_id}', 'ProductsController@create');
});

Route::get('/test', function(){
    return view('auth.register_aditional');
});
Route::get('/homeSimpleUser', function(){
    return view('homeSimpleUser');
});



/*  Products  */
Route::post('/products/ajax-update', ['as'=>'product-ajax-update', 'uses'=>'ProductsController@productAjaxUpdate']);


