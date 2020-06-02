<?php

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
//Admin Routes
Route::group(['namespace' => 'Admin'],function(){
Route::resource('/admin/article','ArticleController');
Route::resource('/admin/category','CategoryController');
Route::get('/admin/home','HomeController@index')->name('admin.home');
Route::resource('/admin/job','JobController');
Route::resource('/admin/news','NewsController');
Route::resource('/admin/team','TeamController');
Route::resource('/admin/practice','PracticeController');
Route::resource('/admin/pracategory','PracategoryController');
Route::get('/admin/application','ApplicationController@index')->name('applied');
});
//front Routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/join', 'HomeController@join');
Route::get('/team', 'HomeController@team');
Route::get('/perspective', 'HomeController@perspective');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');
Route::get('/practice', 'HomeController@practice');
Route::get('/team_detail/{slug}', 'HomeController@team_detail');
Route::get('/practice_detail/{slug}', 'HomeController@practice_detail');
Route::get('/articles/{slug}', 'HomeController@article');
Route::get('/out_about/{slug}', 'HomeController@out_about');
Route::post('/apply', 'HomeController@apply_job');
