<?php

namespace App\Http\Controllers;

use App\Models\IngredientType;
use Illuminate\Http\Request;

class IngredientTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredientType = IngredientType::latest()->get();
        return view('aahar.ingredient_type.index',compact('ingredientType'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type'=>'required',
            'description'=>'required',
        ]);
        $r = IngredientType::create($request->all());
        if($r){
            return back()->with('success','Ingredient Type Has Been Addedd Successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(IngredientType $ingredientType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IngredientType $ingredientType)
    {
        
        $ingredientTypes = IngredientType::latest()->get();
        
        return view('aahar.ingredient_type.edit',compact('ingredientTypes','ingredientType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IngredientType $ingredientType)
    {
        $igrd = $ingredientType;
        $data = [
            'type'=>$request->type,
            'description'=>$request->description,
        ];
      $r =  $igrd->update($data);
      if($r){
        return redirect()->route('ingredient_type.index')->with('success','Your Ingredient Type Has Been Updated Successfully!');
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IngredientType $ingredientType)
    {
        
       $r = $ingredientType->delete();
       if($r){
        return redirect()->route('ingredient_type.index')->with('success','Your Ingredient Type Has Been Deleted Successfully!');
      }
    }
}
