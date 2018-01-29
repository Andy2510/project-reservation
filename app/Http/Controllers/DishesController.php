<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct() {
        // $this->middleware('auth')->except('index');
         $this->middleware('isAdmin')->except('index', 'show');
     }

    public function index()
    {
        $dishes = Dish::get();
        return view('index', [
            'dishes' => $dishes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createDish');
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
      $path = $request->file('imageUrl')->storePublicly('public/photos');

      $post = [
        'title' => $request->get('title'),
        'description' => $request->get('description'),
        'price' => $request->get('price'),
        'imageUrl' => $path
      ];

      Dish::create($post);
      return redirect()->route('index');

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
        return (view('dishEdit'));
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

    protected function validator($data)
    {
        return $data->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'imageUrl' => 'required|mimes:jpeg,bmp,png|max:6000'
          ]);
    }
}
