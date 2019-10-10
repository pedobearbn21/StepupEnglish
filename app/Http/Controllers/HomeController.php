<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Checkword;
use Auth;


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
    public function checkword()
    {
        $user = Auth::user();
        $user->history;
        $user->history[0]->check_id = $user->id;
        $user->history[0]->user_id = $user->id;
    }
    public function relation($id)
    {
        $user = User::find($id);
        $user->history;
        return $user;
    }
}
