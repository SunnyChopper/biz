<?php

namespace App\Http\Controllers;

use App\DownloadLog;

use Illuminate\Http\Request;

class DownloadLogsController extends Controller
{
    
	/* ---------------------- *\
		CRUD Functions
	\* ---------------------- */

	public function create(Request $data) {
		$log = new DownloadLog;
		$log->download_id = $data->download_id;
		$log->user_id = $data->user_id;
		$log->save();

		return response()->json(true, 200);
	}

	public function read() {
		return response()->json(DownloadLog::find($_GET['log_id'])->toArray(), 200);
	}

}
