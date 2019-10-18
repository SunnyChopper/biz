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

// Guest pages
Route::get('/', 'ViewsController@index');
Route::get('/beta', 'ViewsController@beta');
Route::post('/beta/register', 'ViewsController@beta_register');
Route::get('/beta/login', 'ViewsController@beta_login');
Route::post('/beta/login/attempt', 'ViewsController@beta_attempt_login');

// Members pages
Route::get('/beta/dashboard', 'ViewsController@beta_dashboard');
Route::get('/beta/kits', 'ViewsController@beta_kits');
Route::get('/beta/kit/{kit_id}', 'ViewsController@beta_kit');
Route::post('/beta/import', 'ImportKitsController@create');
Route::get('/beta/kit/{kit_id}/pages', 'ViewsController@beta_pages');
Route::get('/beta/kit/{kit_id}/dashboard', 'ViewsController@beta_kit_dashboard');
Route::get('/beta/download/{download_id}', 'DownloadablesController@download');
Route::get('/beta/logout', 'ViewsController@beta_logout');

// Admin pages
Route::get('/admin', 'AdminController@index');
Route::post('/admin/login', 'AdminController@attempt_login');
Route::get('/admin/dashboard', 'AdminController@dashboard');

// Admin kit pages
Route::get('/admin/kits', 'KitsController@admin_view');
Route::get('/admin/kits/new', 'KitsController@admin_new');
Route::get('/admin/kits/{kit_id}/edit', 'AdminController@edit_kit');
Route::post('/admin/kits/create', 'KitsController@create');
Route::post('/admin/kits/update', 'KitsController@update');