<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invited;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        $all=Invited::all();
        $invite=Invited::where('invitation_type', '=', 'دعوة')->get();
        $register=Invited::where('invitation_type', '=', 'تسجيل')->get();
        $waiting=Invited::where('invitation_type', '=', 'تسجيل')
        ->where('req_status', '=', 1)
        ->get();
        $confirmed=Invited::where('invitation_type', '=', 'تسجيل')
        ->where('req_status', '=', 2)
        ->get();
        $rejected=Invited::where('invitation_type', '=', 'تسجيل')
        ->where('req_status', '=', 3)
        ->get();
        
        return view('admin.dashboard',compact('all','invite','register','waiting','confirmed','rejected'));
    }

}
