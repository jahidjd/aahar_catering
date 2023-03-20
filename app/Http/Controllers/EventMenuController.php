<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventMenu;
use App\Models\Event;

class EventMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventMenu = EventMenu::latest()->get();
        $event = Event::get();
        return view('aahar.eventMenu.index',compact('eventMenu','event'));
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
            'event_id'=>'required',
            'menu_name'=>'required',
            'number_of_attendees'=>'required',
        ]);
        $r = EventMenu::create($request->all());
        if($r){
            return back()->with('success','Event Menu Created Successfully');
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
        $eventMenu = EventMenu::find($id);
        $em = EventMenu::latest()->get();
        $event = Event::get();
        return view('aahar.eventMenu.edit',compact('eventMenu','event','em'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $eventMenu = EventMenu::find($id);
        $data = [
            'event_id'=>$request->event_id,
            'menu_name'=>$request->menu_name,
            'number_of_attendees'=>$request->number_of_attendees,
        ];
        $r =  $eventMenu->update($data);
        if($r){
            return redirect()->route('eventMenu.index')->with('success','Event Menu Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eventMenu = EventMenu::find($id);
        $r = $eventMenu->delete();
        if($r){
            return redirect()->route('eventMenu.index')->with('success','Event Menu Updated Successfully');
        }
    }
}
