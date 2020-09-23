<?php

namespace App\Http\Controllers;
use App\Dump;

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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $dumps = Dump::all();
        return view('dashboard', ["dumps" => $dumps]);
    }
}
