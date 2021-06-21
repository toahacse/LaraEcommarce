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

Route::get('/', 'frontend\pagesController@index')->name('index');
Route::get('/contact', 'frontend\pagesController@contact')->name('contact');
Route::get('/search', 'frontend\pagesController@search')->name('products.search');
        /*
        Product routes
        */
Route::group(['prefix' => 'products'], function (){

    Route::get('/', 'frontend\ProductsController@index')->name('products');
    Route::get('/{slug}', 'frontend\ProductsController@show')->name('products.show');

    Route::get('/categories', 'frontend\CategoriesController@index')->name('categories');
    Route::get('/category/{id}', 'frontend\CategoriesController@show')->name('categories.show');

});

        //User routes
Route::group(['prefix' => 'user'], function () {
    Route::get('/token/{token}', 'frontend\VarificationController@verify')->name('user.varification');
    Route::get('/dashboard', 'frontend\UsersController@dashboard')->name('user.dashboard');
    Route::get('/profile', 'frontend\UsersController@profile')->name('user.profile');
    Route::post('/profile/update', 'frontend\UsersController@profileUpdate')->name('user.profile.update');

});

        //Carts routes
Route::group(['prefix' => 'carts'], function () {
    Route::get('/', 'frontend\CartsController@index')->name('carts');
    Route::post('/store', 'frontend\CartsController@store')->name('carts.store');
    Route::post('/update/{id}', 'frontend\CartsController@update')->name('carts.update');
    Route::post('/delete/{id}', 'frontend\CartsController@destroy')->name('carts.delete');

});
        //Checkout routes
Route::group(['prefix' => 'checkout'], function () {
    Route::get('/', 'frontend\CheckoutsController@index')->name('checkouts');
    Route::post('/store', 'frontend\CheckoutsController@store')->name('checkouts.store');

});

        //Admin routes
Route::group(['prefix' => 'admin'], function (){
    Route::get('/index', 'Backend\PagesController@index')->name('admin.index');

    Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');

    Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/resetPost', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

    Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.update.post');

        //product routes
    Route::group(['prefix' => '/product'], function (){
        Route::get('/', 'Backend\ProductsController@index')->name('admin.products');
        Route::get('/create', 'Backend\ProductsController@create')->name('admin.product.create');
        Route::get('/edit/{id}', 'Backend\ProductsController@edit')->name('admin.product.edit');
        Route::post('/store', 'Backend\ProductsController@store')->name('admin.product.store');
        Route::post('edit/{id}', 'Backend\ProductsController@update')->name('admin.product.update');
        Route::post('delete/{id}', 'Backend\ProductsController@delete')->name('admin.product.delete');
    });

        //Order routes
    Route::group(['prefix' => '/Orders'], function (){
        Route::get('/', 'Backend\OrdersController@index')->name('admin.orders');
        Route::get('/view/{id}', 'Backend\OrdersController@show')->name('admin.order.show');

        Route::post('delete/{id}', 'Backend\OrdersController@delete')->name('admin.order.delete');

        Route::post('completed/{id}', 'Backend\OrdersController@completed')->name('admin.order.completed');
        Route::post('paid/{id}', 'Backend\OrdersController@paid')->name('admin.order.paid');

        Route::post('charge_update/{id}', 'Backend\OrdersController@chargeUpdate')->name('admin.order.charge');
        Route::get('/invoice/{id}', 'Backend\OrdersController@generateInvoice')->name('admin.order.invoice');
    });

        //Category routes
    Route::group(['prefix' => '/Category'], function (){
        Route::get('/', 'Backend\CategoriesController@index')->name('admin.categories');
        Route::get('/create', 'Backend\CategoriesController@create')->name('admin.category.create');
        Route::get('/edit/{id}', 'Backend\CategoriesController@edit')->name('admin.category.edit');
        Route::post('/store', 'Backend\CategoriesController@store')->name('admin.category.store');
        Route::post('edit/{id}', 'Backend\CategoriesController@update')->name('admin.category.update');
        Route::post('delete/{id}', 'Backend\CategoriesController@delete')->name('admin.category.delete');
    });
        //Brand routes
    Route::group(['prefix' => '/Brand'], function (){
        Route::get('/', 'Backend\BrandsController@index')->name('admin.brands');
        Route::get('/create', 'Backend\BrandsController@create')->name('admin.brand.create');
        Route::get('/edit/{id}', 'Backend\BrandsController@edit')->name('admin.brand.edit');
        Route::post('/store', 'Backend\BrandsController@store')->name('admin.brand.store');
        Route::post('edit/{id}', 'Backend\BrandsController@update')->name('admin.brand.update');
        Route::post('delete/{id}', 'Backend\BrandsController@delete')->name('admin.brand.delete');
    });

        //Division routes
    Route::group(['prefix' => '/Division'], function (){
        Route::get('/', 'Backend\DivisionsController@index')->name('admin.divisions');
        Route::get('/create', 'Backend\DivisionsController@create')->name('admin.division.create');
        Route::get('/edit/{id}', 'Backend\DivisionsController@edit')->name('admin.division.edit');
        Route::post('/store', 'Backend\DivisionsController@store')->name('admin.division.store');
        Route::post('edit/{id}', 'Backend\DivisionsController@update')->name('admin.division.update');
        Route::post('delete/{id}', 'Backend\DivisionsController@delete')->name('admin.division.delete');
    });

        //Districts routes
    Route::group(['prefix' => '/Districts'], function (){
        Route::get('/', 'Backend\DistrictsController@index')->name('admin.districts');
        Route::get('/create', 'Backend\DistrictsController@create')->name('admin.district.create');
        Route::get('/edit/{id}', 'Backend\DistrictsController@edit')->name('admin.district.edit');
        Route::post('/store', 'Backend\DistrictsController@store')->name('admin.district.store');
        Route::post('edit/{id}', 'Backend\DistrictsController@update')->name('admin.district.update');
        Route::post('delete/{id}', 'Backend\DistrictsController@delete')->name('admin.district.delete');
    });

        //Slider routes
    Route::group(['prefix' => '/Sliders'], function (){
        Route::get('/', 'Backend\SlidersController@index')->name('admin.sliders');
        Route::post('/store', 'Backend\SlidersController@store')->name('admin.sliders.store');
        Route::post('edit/{id}', 'Backend\SlidersController@update')->name('admin.sliders.update');
        Route::post('delete/{id}', 'Backend\SlidersController@delete')->name('admin.sliders.delete');
    });

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

        //API routes
Route::get('get-districts/{id}',function ($id){
    return json_encode(App\Models\District::where('division_id',$id)->get()) ;

});

