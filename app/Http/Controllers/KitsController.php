<?php

namespace App\Http\Controllers;

use App\Kit;

use Illuminate\Http\Request;

class KitsController extends Controller
{
    
	/* ---------------------- *\
		CRUD Functions
	\* ---------------------- */

	public function create(Request $data) {
		$kit = new Kit;
		$kit->image_url = $data->image_url;
		$kit->title = $data->title;
		$kit->description = $data->description;
		$kit->save();

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

		return response()->json(true, 200);
	}

	public function delete(Request $data) {
		$kit = Kit::find($data->kit_id);
		$kit->is_active = 0;
		$kit->save();

		return response()->json(true, 200);
	}

}
