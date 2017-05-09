<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsPost;

class BackendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsposts = NewsPost::orderBy('created_at', 'DESC')->get();

        return view('backend')->with('newsposts', $newsposts);
    }
}
