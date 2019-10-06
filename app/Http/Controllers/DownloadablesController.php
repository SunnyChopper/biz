<?php

namespace App\Http\Controllers;

use App\Downloadable;

use Illuminate\Http\Request;

class DownloadablesController extends Controller
{
    
	/* ---------------------- *\
		CRUD Functions
	\* ---------------------- */

	public function create(Request $data) {
		$d = new Downloadable;
		$d->title = $data->title;
		$d->description = $data->description;
		$d->category = $data->category;
		$d->filepath = $data->filepath;
		$d->save();

		return response()->json(true, 200);
	}

	public function read() {
		return response()->json(Downloadable::find($_GET['download_id'])->toArray(), 200);
	}

	public function update(Request $data) {
		$d = Downloadable::find($data->download_id);
		$d->title = $data->title;
		$d->description = $data->description;
		$d->category = $data->category;
		$d->filepath = $data->filepath;
		$d->save();

		return response()->json(true, 200);
	}

	public function delete(Request $data) {
		$d = Downloadable::find($data->download_id);
		$d->is_active = 0;
		$d->save();

		return response()->json(true, 200);
	}

}
