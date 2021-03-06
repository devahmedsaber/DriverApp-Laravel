<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\User;
use Illuminate\Http\Request;

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

    public function adminView()
    {
        $allUsersTotal = User::count();
        $adminsTotal = User::where('role', 'admin')->count();
        $driversTotal = Driver::count();
        return view('dashboard', compact('allUsersTotal', 'adminsTotal', 'driversTotal'));
    }
}
