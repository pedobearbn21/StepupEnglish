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
        return view('home');
    }
    public function checkword()
    {
        $user = Auth::user();
        // $checkclass = new Checkword;
        // $checkclass->check_id = $user->id;
        $user->history;
        // $user->history[0]->check_id = $user->id;
        $user->history[0]->user_id = $user->id;

        return dd($user->history);
    }
    public function relation()
    {
        $user = Auth::user();
        $user->history;
        dd($user);
    }
}
