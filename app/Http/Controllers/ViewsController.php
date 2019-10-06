<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    
	public function index() {
		$page_title = "Welcome to Business Starter Kits";
		return view('pages.index')->with('page_title', $page_title);
	}

}
