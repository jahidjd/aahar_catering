<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IngredientType;
use App\Models\Ingredient;
use App\Models\Item;
use App\Models\Category;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $igrd_type = IngredientType::get();
        $item = Item::get();
        $igrd = Ingredient::latest()->get();
        $category = Category::get();
        return view('aahar.ingredient.index',compact('igrd_type','igrd','item','category'));
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
            'item_id'=>'required',
            'ingredient_type_id'=>'required',
            'name'=>'required',
            'quantity_per_unit'=>'required',
            'unit_of_quantity'=>'required',
        ]);
        $r = Ingredient::create($request->all());
        if($r){
            return back()->with('success','Your Ingredient has been added successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $igrd_type = IngredientType::get();
        $item = Item::get();
        $igrd = Ingredient::latest()->get();
        $ig = Ingredient::find($id);
        return view('aahar.ingredient.edit',compact('igrd_type','igrd','item','ig'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $igrd = Ingredient::find($id);
        $data = [
            'item_id',
            'ingredient_type_id',
            'name',
            'quantity_per_unit',
            'unit_of_quantity',
        ];
        $r = $igrd->update($data);
        if($r){
            return redirect()->route('ingredient.index')->with('success','Your Ingredient Has been updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $igrd = Ingredient::find($id);
        $r = $igrd->delete();
        if($r){
            return redirect()->route('ingredient.index')->with('success','Your Ingredient Has been deleted successfully');
        }
    }
}
