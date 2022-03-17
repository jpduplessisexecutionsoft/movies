<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use Auth;

class bookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::id())
        {

            $book = new booking();
            $book->show_time = $request->show_time;
            $book->movie = $request->movie;
            $book->cinema = $request->cinema;
            $book->tickets = $request->tickets;
            $book->user = Auth::id();
            $result = md5(rand(1111111111,9999999999));
            $book->code = $result;
            $rows = booking::where('movie', '=', $request->movie)->where('cinema','=',$request->cinema)->get();
            $tickets = 0;
            foreach($rows as $row)
            {
                $tickets += $row['tickets'];
            }

            if (($tickets + $request->tickets) <= 30) {


                $book->save();
                return view('result', compact('result'));

            } else
            {
                //display error of too many tickets
                $result = 'Not enough tickets available';
                return view('result', compact('result'));

            }
        }
        else
        {
            return view('auth.login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
