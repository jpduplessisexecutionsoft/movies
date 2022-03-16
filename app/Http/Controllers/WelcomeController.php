<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movies;

class WelcomeController extends Controller
{

    /**
     * Show the application booking system.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //get all Movies
        $records = Movies::get();
        return view('home', compact('records'));

    }
}
