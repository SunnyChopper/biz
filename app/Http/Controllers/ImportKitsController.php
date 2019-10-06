<?php

namespace App\Http\Controllers;

use App\ImportKit;

use Illuminate\Http\Request;

class ImportKitsController extends Controller
{
    
	/* ---------------------- *\
		CRUD Functions
	\* ---------------------- */

	public function create(Request $data) {
		$kit = new ImportKit;
		$kit->user_id = $data->user_id;
		$kit->kit_id = $data->kit_id;
		$kit->save();

		return response()->json(true, 200);
	}

	public function read() {
		return response()->json(ImportKit::find($_GET['import_id'])->toArray(), 200);
	}

	public function delete(Request $data) {
		$kit = ImportKit::find($data->import_id);
		$kit->is_active = 0;
		$kit->save();

		return response()->json(true, 200);
	}

}
