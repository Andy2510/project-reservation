<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function __construct() {
         $this->middleware('auth')->except('store', 'create');
     }

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
      if(Auth::user()){
        $userId = Auth::user()->id;
      }
      else{
       $userId = NULL;
     }

      $post = [
        'name' => $request['name'],
        'user_id' => $userId,
        'phone' => $request['phone'],
        'no_persons' => $request['no_persons'],
        'date' => $request['date'],
        'time' => $request['time']
      ];
      Reservation::create($post);

     return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        if(Auth::user()->isAdmin()){
          $reservations = Reservation::get();
        }
        else{
          $reservations = Reservation::where('user_id', Auth::user()->id)->get();

        }

        $reservationsArray = [];
        foreach($reservations as $reservation) {
          $reservationsArray[] = $reservation;
        }

        return view ('reservation', [
          'reservations' => $reservations
        ]);

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
      return redirect()->route('index');
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
