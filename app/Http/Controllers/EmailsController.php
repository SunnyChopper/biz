<?php

namespace App\Http\Controllers;

use App\Email;

use Illuminate\Http\Request;

class EmailsController extends Controller
{
    
	/* ---------------------- *\
		CRUD Functions
	\* ---------------------- */

	public function submit(Request $data) {
		if (Email::where('email', strtolower($data->email))->count() > 0) {
			return response()->json(false, 200);
		} else {
			$email = new Email;
			$email->email = strtolower($data->email);
			$email->save();

			return response()->json(true, 200);
		}
	}

}
