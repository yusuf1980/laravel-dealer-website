<?php

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

Route::group(['prefix' => 'amartha', 'middleware' => ['web', 'auth'], 'namespace' => 'Admin'], function () {
    // Backpack\NewsCRUD
    CRUD::resource('article', 'ArticleCrudController');
    CRUD::resource('product', 'ProductCrudController');
    CRUD::resource('category', 'CategoryCrudController');
    CRUD::resource('product-category', 'ProductCategoryCrudController');
    CRUD::resource('tag', 'TagCrudController');
    CRUD::resource('user', 'UserCrudController'); 
    CRUD::resource('setting', 'SettingCrudController');
    CRUD::resource('page', 'PageCrudController');
    CRUD::resource('slider', 'SliderCrudController');
    CRUD::resource('menu-item', 'MenuItemCrudController');
    CRUD::resource('setting-homepage', 'SethomeCrudController');
    CRUD::resource('setting-topmenu', 'SettopmenuCrudController');
    //CRUD::resource('setting-sidebar', 'SetsidebarCrudController');
    CRUD::resource('setting-footer', 'SetfooterCrudController');
    //CRUD::resource('album', 'AlbumCrudController');
    CRUD::resource('photos', 'GalleryCrudController');
    Route::group(['middleware' => 'api'], function () {
        Route::post('photos/{id}/upload_images', 'GalleryCrudController@ajaxUploadImages');
        Route::post('photos/{id}/reorder_images', 'GalleryCrudController@ajaxReorderImages');
        Route::post('photos/{id}/delete_image', 'GalleryCrudController@ajaxDeleteImage');
    });
    Route::get('slider/create/{template}', 'SliderCrudController@create');
    Route::get('slider/{id}/edit/{template}', 'SliderCrudController@edit');
    /*Route::get('products/{product}', 'MediaCrudController@mediaProduct');
    Route::get('products/{product}/create', 'MediaCrudController@create');*/
    Route::group(['prefix' => 'product/{product_id}'], function()
    {
        CRUD::resource('media', 'MediaCrudController');
        Route::get('media/create/{template}', 'MediaCrudController@create');
        //Route::post('media', 'MediaCrudController@store');
        Route::get('media/{id}/edit/{template}', 'MediaCrudController@edit');
    });
    //Route::get('product/{product_id}/media/{id}/edit/{template}', 'MediaCrudController@edit');
    //Route::post('product/{product_id}/media', 'MediaCrudController@store');
    //Route::post('product/{product_id}/media/{id}', 'MediaCrudController@update');
    
});

Route::get('/', 'HomeController@index');
//Route::get('berita/{slug}', 'HomeController@show');
//Route::get('artikel/{slug}', 'HomeController@show');
Route::get('berita-terbaru/semua', 'BlogController@index');
Route::get('berita/{slug}', 'BlogController@show');
Route::get('kategori/{slug}', 'BlogController@category');
Route::get('tag/{slug}', 'BlogController@tag');
/*Route::get('page', function() {
    abort(404);
});*/
Route::get('{slug}', 'HomeController@page');
Route::get('album/{slug}', 'HomeController@album');
Route::get('search/cari', 'HomeController@search');
Route::post('contact/contact', 'HomeController@getContact');
Route::post('contact/order', 'HomeController@getOrder');
Route::post('contact/booking', 'HomeController@getBooking');

Route::get('mobil/{slug}', 'HomeController@product');

Route::group(['middleware' => 'api'], function () {
    Route::post('mobil/{slug}/send', 'HomeController@sendContact');
});

Route::get('test/test', 'HomeController@test');
