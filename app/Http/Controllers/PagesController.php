<?php

namespace App\Http\Controllers;

use App\Page;

use Illuminate\Http\Request;

class PagesController extends Controller
{

	/* ---------------------- *\
		Get Functions
	\* ---------------------- */

	public function get_pages($kit_id) {
		return response()->json(Page::where('kit_id', $kit_id)->active()->get()->toArray(), 200);
	}
    
	/* ---------------------- *\
		CRUD Functions
	\* ---------------------- */

	public function create(Request $data) {
		$page = new Page;
		$page->kit_id = $data->kit_id;
		$page->section = $data->section;
		$page->order = $data->order;
		$page->title = $data->title;
		$page->body = $data->body;
		$page->save();

		return response()->json(true, 200);
	}

	public function read() {
		return response()->json(Page::find($_GET['page_id'])->toArray(), 200);
	}

	public function update(Request $data) {
		$page = Page::find($data->page_id);
		$page->section = $data->section;
		$page->order = $data->order;
		$page->title = $data->title;
		$page->body = $data->body;
		$page->save();

		return response()->json(true, 200);
	}

	public function delete(Request $data) {
		$page = Page::find($data->page_id);
		$page->is_active = 0;
		$page->save();

		return response()->json(true, 200);
	}

}
