<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Title;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth')->except('invite');
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

    /**
     * Show Website Home Page
     */
    public function invite()
    {
        $titles=Title::all();
        return view('invite',compact('titles'));
    }

    /**
     * Show invitation register Result Page
     */
    public function inviteReg()
    {
        return view('inviteReg');
    }

}
