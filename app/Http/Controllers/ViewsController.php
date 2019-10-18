<?php

namespace App\Http\Controllers;

use Auth;

use App\Kit;
use App\User;
use App\Page;
use App\ImportKit;
use App\Downloadable;

use App\Custom\KitsHelper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ViewsController extends Controller
{
    
	public function index() {
		$page_title = "Welcome to Business Starter Kits";
		return view('pages.index')->with('page_title', $page_title);
	}

	public function beta_login() {
		$page_title = "Login";
		return view('pages.login')->with('page_title', $page_title);
	}

	public function beta_attempt_login(Request $data) {
		if (User::where('username', strtolower($data->username))->count() > 0) {
			$user = User::where('username', strtolower($data->username))->first();
			if (Hash::check($data->password, $user->password) == true) {
				Auth::login($user);
				return redirect(url('/beta/dashboard'));
			} else {
				return redirect()->back()->with('error', 'Password is incorrect.')->withInput();
			}
		} else {
			return redirect()->back()->with('error', 'Username does not exist.')->withInput();
		}
	}

	public function beta() {
		$page_title = "Use Your Invite Code";
		return view('pages.beta')->with('page_title', $page_title);
	}

	public function beta_register(Request $data) {
		if ($data->code != "v8eqm4a1") {
			return redirect()->back()->with('error', 'Invite code is invalid.')->withInput();
		}

		if (User::where('username', strtolower($data->username))->count() > 0) {
			return redirect()->back()->with('error', 'Username is taken.')->withInput();
		}

		if (User::where('email', strtolower($data->email))->count() > 0) {
			return redirect()->back()->with('error', 'Email is taken.')->withInput();
		}

		$user = new User;
		$user->first_name = $data->first_name;
		$user->last_name = $data->last_name;
		$user->email = strtolower($data->email);
		$user->username = strtolower($data->username);
		$user->password = Hash::make($data->password);
		$user->save();

		Auth::login($user);

		return redirect(url('/beta/dashboard'));
	}

	public function beta_dashboard() {
		if (Auth::guest()) {
			return redirect(url('/beta/login'));
		}

		$page_title = "Your Dashboard";
		$imports = ImportKit::where('user_id', Auth::id())->active()->get();

		return view('members.dashboard')->with('page_title', $page_title)->with('imports', $imports);
	}

	public function beta_kits() {
		if (Auth::guest()) {
			return redirect(url('/beta/login'));
		}

		$page_title = "All Starter Kits";
		$kits = Kit::active()->get();

		return view('members.kits')->with('page_title', $page_title)->with('kits', $kits);
	}

	public function beta_kit($kit_id) {
		if (Auth::guest()) {
			return redirect(url('/beta/login'));
		}

		$kit = Kit::find($kit_id);
		$downloadables = Downloadable::where('kit_id', $kit_id)->get();
		$page_title = $kit->title;

		return view('members.kit')->with('page_title', $page_title)->with('kit', $kit)->with('downloadables', $downloadables);
	}

	public function beta_pages($kit_id) {
		if (Auth::guest()) {
			return redirect(url('/beta/login'));
		}

		if (KitsHelper::hasUserImported(Auth::id(), $kit_id) == false) {
			return redirect(url('/beta/kit/' . $kit_id));
		}

		$kit = Kit::find($kit_id);
		$pages = Page::where('kit_id', $kit_id)->active()->orderBy('order', 'ASC')->get();
		$page_title = $kit->title;
		return view('members.pages')->with('page_title', $page_title)->with('kit', $kit)->with('pages', $pages);
	}

	public function beta_kit_dashboard($kit_id) {
		if (Auth::guest()) {
			return redirect(url('/beta/login'));
		}

		if (KitsHelper::hasUserImported(Auth::id(), $kit_id) == false) {
			return redirect(url('/beta/kit/' . $kit_id));
		}

		$kit = Kit::find($kit_id);
		$downloadables = Downloadable::where('kit_id', $kit->id)->active()->get();
		$pages = Page::where('kit_id', $kit_id)->active()->orderBy('section', 'DESC')->get();

		$page_title = "Dashboard";

		return view('members.kit-dashboard')->with('page_title', $page_title)->with('kit', $kit)->with('downloadables', $downloadables)->with('pages', $pages);
	}

	public function beta_logout() {
		Auth::logout();
		return redirect(url('/'));
	}

}
