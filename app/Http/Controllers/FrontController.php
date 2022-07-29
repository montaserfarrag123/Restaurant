<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Order;

class FrontController extends Controller
{

    public function index(Request $Request)
    {
        if(!$Request->category){
            $meals = Meal::latest()->get();
            return view('frontpage',compact('meals'));
        }
        $meals = Meal::where('category' , $Request->category)->get();
        return view('frontpage',compact('meals'));
    }




    public function show($id)
    {
      $meal = Meal::find($id);
      return view('meals.show',compact('meal'));
    }


    public function edit($id)
    {
        //
    }

    public function store(Request $request)
    {
        $order = order::create([
            'user_id' => auth()->user()->id,
            'meal_id' => $request->meal_id,

            'time' => $request->time,
            'date' => $request->date,
            'phone' => $request->phone,

            'small_meal' =>$request->small_meal,
            'medium_meal' =>$request->meduim_meal,
            'large_meal' =>$request->large_meal,

            'body' => $request->body,
        ]);

        return redirect()->back()->with('message' , ' your order added successfully');
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
