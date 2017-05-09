<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsPost;

class HomeController extends Controller
{
    //

    public function index()
    {
         $newsposts = NewsPost::orderBy('created_at', 'DESC')->get();

        return view('index')->with('newsposts', $newsposts);
    }
}
