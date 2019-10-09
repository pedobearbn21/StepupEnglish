<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\User;
use Illuminate\Checkword;


class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('layouts/app');
    }
    public function checkword(Request $request)
    {

    }
     public function relation($id)
    {
        $user = User::find($id)->history();
        return $user;
    }
}
