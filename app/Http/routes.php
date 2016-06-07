<?php

# Static Pages. Redirecting admin so admin cannot access these pages.
Route::group(['middleware' => ['redirectAdmin']], function()
{
    Route::get('/', ['as' => 'home', 'uses' => 'PagesController@getHome']);
    Route::get('about', ['as' => 'about', 'uses' => 'PagesController@getAbout']);
    Route::get('contact', ['as' => 'contact', 'uses' => 'PagesController@getContact']);
});

# Registration
Route::group(['auth', 'admin'], function()
{
 
});

# Authentication
Route::get('login', ['as' => 'login', 'middleware' => 'guest', 'uses' => 'SessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController' , ['only' => ['create','store','destroy']]);

# Forgotten Password
Route::group(['middleware' => 'guest'], function()
{
    Route::get('forgot_password', 'Auth\PasswordController@getEmail');
    Route::post('forgot_password','Auth\PasswordController@postEmail');
    Route::get('reset_password/{token}', 'Auth\PasswordController@getReset');
    Route::post('reset_password/{token}', 'Auth\PasswordController@postReset');
});

# Standard User Routes
Route::group(['middleware' => ['auth','standardUser']], function()
{
    Route::get('userProtected', 'StandardUser\StandardUserController@getUserProtected');
    Route::resource('profiles', 'StandardUser\UsersController', ['only' => ['show', 'edit', 'update']]);
});

# Admin Routes
Route::group(['middleware' => ['auth', 'admin']], function()
{
    Route::get('register', 'RegistrationController@create');
    Route::post('register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);
    Route::get('admin', ['as' => 'admin_dashboard', 'uses' => 'Admin\AdminController@getHome']);
    Route::resource('admin/profiles', 'Admin\AdminUsersController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);
    
});

# Moder Routes
Route::group(['middleware' => ['auth', 'moderator']], function()
{
    Route::get('moder', ['as' => 'moder_dashboard', 'uses' => 'Moder\ModerController@getHome']);
    Route::resource('moder/profile', 'Moder\ModerUserController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);

});

Route::group(['middleware' => ['auth']], function()
{
    Route::any('ajax/upload-pic', ['as' => 'uploadImage', 'uses' => 'ImageController@ajaxUploadImage']);
    Route::resource('/recipes', 'RecipesController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);
});

Route::post('upload', ['as' => 'upload-post', 'uses' =>'Image1Controller@postUpload']);
Route::post('upload/delete', ['as' => 'upload-remove', 'uses' =>'Image1Controller@deleteUpload']);