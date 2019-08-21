<?php

namespace App\Http\Controllers;

use App\Meal;
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
        $openMeals = Meal::where('is_open', 1)->orderBy('date', 'desc')->get();
        $closedMeals = Meal::where('is_open', 0)->orderBy('date', 'desc')->get();

        return view('home', ['openMeals' => $openMeals, 'closedMeals' => $closedMeals]);
    }
}
