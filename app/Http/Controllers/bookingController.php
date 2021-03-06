<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;
use App\Models\booking;
use Auth;
use View;

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
            //check whether there are enough tickets available for the booking
            if (($tickets + $request->tickets) <= 30) {


                $book->save();
                //get redemption code(s)
                $codes = booking::where('user','=',Auth::id())->get();
                //get all showings of films
                $records = Movies::get();
                return view::Make('home')->with(compact('records'))->with(compact('codes'));

            } else
            {
                //display error of too many tickets
                $result = 'Not enough tickets available. '.$tickets . ' are available.';
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
        $booking = booking::findOrFail($id);
        $booking->delete();
        $result = 'deleted.';
        return view('result', compact('result'));
    }
}
