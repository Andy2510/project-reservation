<?php

namespace App\Http\Controllers;

use App\User;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class ProfileController extends Controller
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
        //
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
    public function edit()
    {
        $countries = Country::get();
        return view('profile', [
          'salys' => $countries

        ]);

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
        $this->validator($request);
        $user = User::findOrFail($id);
        $post = $request->except('_token');
        $post = [
          'name' => $post['name'],
          'surname' => $post['surname'],
          'date_of_birth' => $post['date_of_birth'],
          'phone' => $post['phone'],
          'email' => $post['email'],
          'password' => bcrypt($post['password']),
          'address' => $post['address'],
          'city' => $post['city'],
          'zip' => $post['zip'],
          'country_id' => $post['country'],
        ];

        $user->update($post);
        return redirect()->to('/home');
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

    protected function validator($data)
    {
        return $data->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'date_of_birth' => 'required|date_format:Y-m-d',
            'phone' => 'required|regex:/(\+)?\d+1/|max:12',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip' => 'required|string|max:10',
          ]);
    }
}
