<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;

class PagesController extends Controller
{
    public function index()
	{
	    $leads = Lead::all();
	    return view('index', compact('leads'));
	}
}
