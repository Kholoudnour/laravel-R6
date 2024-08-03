<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classtop;
use Illuminate\Http\RedirectResponse;

class ClassesController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $classes = Classtop::get();
        return view('classes', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view(('add_class'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $classname = 'Backend';
        // $capacity  = '30';
        // $isfulled = 'yes';
        // $price ='1000';
        
        // Classtop::create([
        //     'classname'=> $classname,
        //     'capacity'=> 30, 
        //     'isfulled'=> true,
        //     'price'=> 1000,
        // Classtop::create([
        //     'classname' =>$request ->classname, 
        //     'price' =>$request -> price, 
        //     'capacity'=>$request ->capacity,
        //     'isfulled'=>isset($request->isfulled),
        //     'timefrom' =>$request ->timefrom, 
        //     'timeto'=>$request ->timeto,
        // ]);
        //     return "Data Added Successfuly";
            $data = $request -> validate([
                'classname' => 'required|string', 
                'price' => 'required|numeric', 
                'capacity' => 'required|string|max:1000',
                'timefrom' =>'required|regex:/^([01][0-9]|2[0-3]):([0-5][0-9])$/', 
                'timeto' =>'required|regex:/^([01][0-9]|2[0-3]):([0-5][0-9])$/',
            
                ]);
            
                
            dd($request);
                $data['published'] = isset ($request->published);
                classtop::create($data);
                   return "Data Added Successfuly";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class = Classtop::findOrFail($id);
        return  view('class_detail', compact('class')); 
       }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = Classtop::findorfail($id);
        return  view('edit_class', compact('class'));
         return "Data Added Successfuly";
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
 //   dd($request, $id);
            // $data = [
  
            // 'classname' =>$request ->classname, 
            // 'price' =>$request -> price, 
            // 'capacity'=>$request ->capacity,
            // 'isfulled'=>isset($request->isfulled),
            // 'timefrom' =>$request ->timefrom, 
            // 'timeto'=>$request ->timeto,
            //     ];
            // classtop::where('id', $id)->update($data);  
            // return "Data Added Successfuly";
            $data = $request -> validate([
                'classname' => 'required|string', 
                'price' => 'required|numeric', 
                'capacity' => 'required|string|max:1000',
                'timefrom' =>'required|regex:/^([01][0-9]|2[0-3]):([0-5][0-9])$/', 
                'timeto' =>'required|regex:/^([01][0-9]|2[0-3]):([0-5][0-9])$/',
            
                 ]);
              
                 
            // dd($request);
                 $data['published'] = isset ($request->published);
                 classtop::create($data);
                  return "Data Added Successfuly";
          }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $id = $request->id;
        classtop::where('id', $id)->delete();
        // return "Class Deleted";

        return redirect()->route('class.index');
        }
        public function showdeleted(){
            $classes = classtop::onlyTrashed()->get();
            return view('trashed_classes', compact('classes'));
        }
        public function restore(string $id) {
            Classtop::where('id', $id)->restore();
            return redirect()->route('class.index');
        }
        public function forcedelete(string $id) {
            Classtop::where('id', $id)->forcedelete();
            return redirect()->route('class.index');
        }
         
}
