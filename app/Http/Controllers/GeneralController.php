<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index ()
    {
        return view('index');
    }

    public function auth (Request $request)
    {
        $a = $request->session();
    }

    public function login ()
    {
        return view('seller.login');
    }
}
