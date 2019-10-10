<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;

use App\DownloadLog;
use App\Downloadable;

use Illuminate\Http\Request;

class DownloadablesController extends Controller
{

	/* ---------------------- *\
		Helper Functions
	\* ---------------------- */

	public function download($download_id) {
		$d = Downloadable::find($download_id);

		$log = new DownloadLog;
		$log->download_id = $download_id;
		$log->user_id = Auth::id();
		$log->save();

		return redirect()->away($d->filepath);
	}
    
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
