<?php

use Illuminate\Http\Request;

use App\User;
use App\Custom\KitsHelper;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users/email/check', function() {
	if (User::where('email', strtolower($_GET['email']))->count() > 0) {
		return response()->json(false, 200);
	} else {
		return response()->json(true, 200);
	}
});

Route::get('/users/username/check', function() {
	if (User::where('username', strtolower($_GET['username']))->count() > 0) {
		return response()->json(false, 200);
	} else {
		return response()->json(true, 200);
	}
});

Route::get('/users/kits/imported', function() {
	if (KitsHelper::hasUserImported($_GET['user_id'], $_GET['kit_id']) == true) {
		return response()->json(true, 200);
	} else {
		return response()->json(false, 200);
	}
});

Route::post('/imports/create', 'ImportKitsController@create');

Route::get('/kits', 'KitsController@get_kits');
Route::get('/kits/{kit_id}/pages', 'PagesController@get_pages');

Route::post('/pages/create', 'PagesController@create');
Route::post('/pages/edit', 'PagesController@update');

Route::post('/email/submit', 'EmailsController@submit');