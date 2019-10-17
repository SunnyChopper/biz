<?php

namespace App\Http\Controllers;

use Auth;

use App\Custom\AdminHelper;
use Illuminate\Http\Request;
use Illuminate\Facades\Support\Hash;

use App\User;
use App\Kit;

class AdminController extends Controller
{
    
	public function index() {
		if (AdminHelper::isLoggedIn() == true) {
			return redirect(url('/admin/dashboard'));
		} else if (AdminHelper::isHalfLoggedIn() == true) {
			AdminHelper::completeHalfLogin();
		}

		$page_title = 'Admin Login';
		return view('admin.index')->with('page_title', $page_title);
	}

	public function attempt_login(Request $data) {
		if (User::where('username', strtolower($data->username))->count() > 0) {
			$user = User::where('username', strtolower($data->username))->first();

			if (AdminHelper::isAdmin($user->id) == true) {
				if (Hash::check($data->password, $user->password) == true) {
					AdminHelper::loginAdmin($user->id);
					Auth::login($user);
					return redirect(url('/admin/dashboard'));
				} else {
					return redirect()->back()->with('error', 'Password is incorrect.')->withInput();
				}
			} else {
				return redirect()->back()->with('error', 'User is not authorized.')->withInput();
			}
		} else {
			return redirect()->back()->with('error', 'Username not found.');
		}
	}

	public function dashboard() {
		if (AdminHelper::isLoggedIn() == false) {
			return redirect(url('/admin'));
		}

		$page_title = "Admin Dashboard";
		$kits = Kit::active()->get();

		return view('admin.dashboard')->with('page_title', $page_title)->with('kits', $kits);
	}

	public function edit_kit($kit_id) {
		if (AdminHelper::isLoggedIn() == false) {
			return redirect(url('/admin'));
		}

		$page_title = 'Edit Starter Kit';
		$kit = Kit::find($kit_id);

		return view('admin.kits.edit')->with('page_title', $page_title)->with('kit', $kit);
	}

}
