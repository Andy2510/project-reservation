<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use App\Helpers\PhotoHelper;

class DishesController extends Controller
{

      private $photoHelper;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(PhotoHelper $photoHelper) {
        // $this->middleware('auth')->except('index');
         $this->middleware('isAdmin')->except('index', 'show');
         $this->photoHelper = $photoHelper;
     }

    public function index()
    {
        $dishes = Dish::paginate(6);

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
    public function edit($id)
    {
        $dish = Dish::findOrFail($id);
        return view('dishEdit', [
          'dish' => $dish
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

      $path = $request->file('imageUrl')->storePublicly('public/photos');

      $post = [
        'title' => $request->get('title'),
        'description' => $request->get('description'),
        'price' => $request->get('price'),
        'imageUrl' => $path
      ];

      $dish = Dish::findOrFail($id);
      $this->deletePhotoFromFS($dish);
      $dish->update($post);
      return redirect()->to('/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $dish = Dish::findOrFail($id);
      $this->deletePhotoFromFS($dish);
      $dish->delete();
      return redirect()->route('index');
    }

    public function deletePhotoFromFS($dish) {
      $path = storage_path('app/' . $dish->imageUrl);

      if (file_exists($path)){
          unlink($path);
      }
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
