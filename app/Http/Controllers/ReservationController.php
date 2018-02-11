<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
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
        return view('createReservation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validator($request);
      $post = $request->except('_token');

      if(!Auth::check()){
        $post = [
          'name' => $request->get('name'),
          'phone' => $request->get('phone'),
          'no_persons' => $request->get('no_persons'),
          'date' => $request->get('date'),
          'time' => $request->get('time')
        ];
      }else{
        $post = [
          'name' => $request->get('name'),
          'user_id' => $request->get('user_id'),
          'phone' => $request->get('phone'),
          'no_persons' => $request->get('no_persons'),
          'date' => $request->get('date'),
          'time' => $request->get('time')
        ];
      }

      Reservation::create($post);

//      return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
      //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $reservation = Reservation::findOrFail($id);
      $reservation->delete();
//      return redirect()->route('index');
    }

    protected function validator($data)
{
    return $data->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'no_persons' => 'required',
        'date' => 'required|date_format:Y-m-d',
        'time' => 'required'
      ]);
}
}
