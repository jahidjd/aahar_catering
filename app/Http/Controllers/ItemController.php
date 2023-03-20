<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = Item::latest()->get();
        $category = Category::get();
        return view('aahar.item.index',compact('item','category'));
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
            'category_id'=>'required',
            'item_name'=>'required',
            'avg_per_head_qunatity'=>'required',
            'unit_of_measurement'=>'required',
        ]);
        $r = Item::create($request->all());
        if($r){
            return back();
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
        $item = Item::find($id);
        $items = Item::latest()->get();
        $category = Category::get();
        return view('aahar.item.edit',compact('item','category','items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Item::find($id);
        $data = [
            'category_id'=>$request->category_id,
            'item_name'=>$request->item_name,
            'avg_per_head_qunatity'=>$request->avg_per_head_qunatity,
            'unit_of_measurement'=>$request->unit_of_measurement,
        ];
       $r =  $item->update($data);
       if($r){
         return redirect()->route('item.index')->with('success','Your Item Has Been Updated Successfully!');
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::find($id);
        $r  = $item->delete();
        if($r){
            return redirect()->route('item.index')->with('success','Your Item Has Been Deleted Successfully!');
          }
    }
}
