<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movies;
use App\Models\booking;
use Auth;
use View;

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
     * Show the application booking system.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //get redemption code(s)
        $codes = booking::where('user','=',Auth::id())->get();
         //get all showings of films
        $records = Movies::get();
        return view::Make('home')->with(compact('records'))->with(compact('codes'));

    }
}
