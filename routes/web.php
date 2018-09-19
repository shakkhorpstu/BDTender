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

Route::get('/', 'Frontend\PagesController@index')->name('index');
Route::get('/tender/{slug}', 'Frontend\PagesController@singleTender')->name('singleTender');
Route::get('/all-tender', 'Frontend\PagesController@allTenders')->name('allTender');
Route::post('/tender/apply/{slug}', 'Frontend\PagesController@applyForTender')->name('applyForTender');
Route::get('/category/{slug}', 'Frontend\PagesController@categoryTender')->name('categoryTender');
Route::get('/place/{city}', 'Frontend\PagesController@placeTender')->name('placeTender');
Route::get('/organization/{name}', 'Frontend\PagesController@organizationTender')->name('organizationTender');


// Login & Logout
Route::get('/login', 'Auth\User\LoginController@showLoginForm')->name('user.login');
Route::post('/login', 'Auth\User\LoginController@login')->name('user.login.submit');
Route::post('/logout', 'Auth\User\LoginController@logout')->name('user.logout');

// Registration
Route::get('/register', 'Auth\User\RegisterController@showRegistrationForm')->name('registerUserForm');
Route::post('/register', 'Auth\User\RegisterController@register')->name('registerUser');
Route::post('/verify/{token}', 'Auth\User\RegisterController@verify')->name('userVerify');

//Password resets routes
Route::post('/password/email', 'Auth\User\ForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
Route::get('/password/reset', 'Auth\User\ForgotPasswordController@showLinkRequestForm')->name('user.password.request');
Route::post('/password/reset', 'Auth\User\ResetPasswordController@reset');
Route::get('/password/reset/{token}', 'Auth\User\ResetPasswordController@showResetForm')->name('user.password.reset');

Route::get('/dashboard', 'Frontend\UserController@index')->name('user.dashboard');


Route::group(['prefix' => 'my-tender'], function(){
  Route::get('/', 'Frontend\TenderController@index')->name('user.tender.index');
  Route::get('/add', 'Frontend\TenderController@create')->name('user.tender.create');
  Route::post('/add', 'Frontend\TenderController@store')->name('user.tender.store');
  Route::get('/edit/{slug}', 'Frontend\TenderController@create')->name('user.tender.edit');
  Route::post('/edit/{slug}', 'Frontend\TenderController@update')->name('user.tender.update');
  Route::post('/delete/{slug}', 'Frontend\TenderController@destroy')->name('user.tender.delete');
  Route::get('/apply/{slug}', 'Frontend\TenderController@tenderApply')->name('user.tender.tenderApply');
  Route::get('/confirm/{id}', 'Frontend\TenderController@confirmTender')->name('user.confirm.tenderRequest');
  Route::get('/complete/{slug}', 'Frontend\TenderController@compeletdTender')->name('compeletdTender');
});




/**
 * Admin Routes
 */
Route::group(['prefix' => 'admin'], function(){
    // Login & Logout
    Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');

    //Password resets routes
    Route::post('/password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

    Route::get('/', 'Backend\PagesController@index')->name('admin.dashboard');


    Route::group(['prefix' => 'category'], function(){
      Route::get('/', 'Backend\CategoryController@index')->name('admin.category.index');
      Route::post('/add', 'Backend\CategoryController@store')->name('admin.category.store');
      Route::post('/edit/{id}', 'Backend\CategoryController@update')->name('admin.category.update');
      Route::post('/delete/{id}', 'Backend\CategoryController@destroy')->name('admin.category.delete');
    });
});
