<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::latest()->get();
        return view('aahar.category.index',compact('category'));
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
            'name'=>'required',
            'description'=>'required',
        ]);
        $c = Category::create($request->all());
        if($c){
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
        $cat = Category::find($id);
        $category = Category::latest()->get();
        return view('aahar.category.edit',compact('cat','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cat = Category::find($id);
        $data = [
            'name'=>$request->name,
            'description'=>$request->description,
        ];
       $r = $cat->update($data);
       if($r){
        return redirect()->route('category.index')->with('success','Your Category Has Been Updated Successfully!');
       }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $r = Category::find($id);
        $t = $r->delete();
        if($r){
            return  redirect()->route('category.index')->with('success','your Category has been deleted Successfullly');
        }
    }
}
