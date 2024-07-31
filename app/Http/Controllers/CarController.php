<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */

  
   


    public function index()
    {
        //get all cars from Database
        // retrun view all cars, cars data
        // select *from cars
        $cars = car::get();
        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_car');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = $request -> validate([
        //     'carTitle' => 'required|string', 
        //     'description' => 'required|string|max:1000',
        //     'price' => 'required|numaric', 
        
        //      ]);
          
        // dd($request);
        //      $data['published'] = isset ($request->published);
        //      car::create($data);
            }        

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return  view('car_detail', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        return  view('edit_car', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    //   dd($request, $id);
    $data = [
        
            'cartitle' =>$request ->title, 
            'price' =>$request -> price, 
            'description'=>$request ->description,
            'published'=>isset($request->published),
    ];
    car::where('id', $id)->update($data);
   
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        car::where('id', $id)->delete();
        // return "Car Deleted";
        return redirect()->route('cars.index');
    }
    public function showdeleted(){
        $cars = car::onlyTrashed()->get();
        return view('trashed_cars', compact('cars'));
    }
    public function restore(string $id) {
        car::where('id', $id)->restore();
        return redirect()->route('cars.index');
    }
    public function forcedelete(string $id) {
        car::where('id', $id)->forcedelete();
        return redirect()->route('cars.index');
    }
     
}
