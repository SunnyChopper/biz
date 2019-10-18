<?php

namespace App\Http\Controllers;

use App\Kit;
use App\Custom\AdminHelper;

use Illuminate\Http\Request;

class KitsController extends Controller
{

	/* ---------------------- *\
		Admin Views
	\* ---------------------- */

	public function admin_view() {
		if (AdminHelper::isLoggedIn() == false) {
			return redirect(url('/admin'));
		}

		$page_title = "Starter Kits";
		$kits = Kit::active()->get();

		return view('admin.kits.view')->with('page_title', $page_title)->with('kits', $kits);
	}

	public function admin_new() {
		if (AdminHelper::isLoggedIn() == false) {
			return redirect(url('/admin'));
		}

		$page_title = "New Starter Kit";

		return view('admin.kits.new')->with('page_title', $page_title);
	}
    
	/* ---------------------- *\
		Get Functions
	\* ---------------------- */

	public function get_kits() {
		return response()->json(Kit::active()->get()->toArray(), 200);
	}

	/* ---------------------- *\
		CRUD Functions
	\* ---------------------- */

	public function create(Request $data) {
		$kit = new Kit;
		$kit->image_url = $data->image_url;
		$kit->title = $data->title;
		$kit->description = $data->description;
		$kit->save();

		if (isset($data->from)) {
			if ($data->from == 'web') {
				return redirect(url('/admin/kits'));
			}
		}

		return response()->json(true, 200);
	}

	public function read() {
		return response()->json(Kit::find($_GET['kit_id'])->toArray(), 200);
	}

	public function update(Request $data) {
		$kit = Kit::find($data->kit_id);
		$kit->image_url = $data->image_url;
		$kit->title = $data->title;
		$kit->description = $data->description;
		$kit->save();

		if (isset($data->from)) {
			if ($data->from == "web") {
				return redirect(url('/admin/kits'));
			}
		}

		return response()->json(true, 200);
	}

	public function delete(Request $data) {
		$kit = Kit::find($data->kit_id);
		$kit->is_active = 0;
		$kit->save();

		return response()->json(true, 200);
	}

}
