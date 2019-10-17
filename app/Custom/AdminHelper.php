<?php

namespace App\Custom;

use Illuminate\Support\Facades\Session;

use App\User;

class AdminHelper {
	
	public static function isLoggedIn() {
		if (Session::get('admin_id') != -1) {
			return true;
		} else {
			return false;
		}
	}

	public static function loginAdmin($user_id) {
		Session::put('admin_id', $user_id);
		Session::save();
	}

	public static function isAdmin($user_id) {
		if (User::find($user_id)->backend_auth == 0) {
			return false;
		} else {
			return true;
		}
	}

	public static function isHalfLoggedIn() {
		if (!Auth::guest()) {
			if (Auth::user()->backend_auth == 0) {
				return false;
			} else {
				return true;
			}
		} else {
			return false;
		}
	}

	public static function completeHalfLogin() {
		Session::put('admin_id', Auth::user()->id);
		Session::save();
	}

}