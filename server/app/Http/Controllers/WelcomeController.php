<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        return view('welcome');
    }
}
