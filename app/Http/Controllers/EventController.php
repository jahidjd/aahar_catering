<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = Event::latest()->get();
        return view('aahar.event.index',compact('event'));
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
            'event_name'=>'required',
            'event_date'=>'required',
            'address'=>'required',
            'phone'=>'required|numeric|digits:10',
            'email'=>'required',
            'party_name'=>'required',
            'organized_by'=>'required',
            'arrangement'=>'required',
        ]);
        $e = Event::latest()->first();
        if($e!=''){
            $lastNumber = $e->id;
            $date = Carbon::createFromFormat('dmY', '060323');
            $d = Carbon::now();
            $dateString = $d->format('dmY') . '_' . ($lastNumber + 1);
          
        }else{
            $lastNumber = 0;
            $date = Carbon::createFromFormat('dmY', '060323');
            $d = Carbon::now();
            $dateString = $d->format('dmY') . '_' . ($lastNumber + 1);
           
        }
        $data = [
            'event_name'=>$request->event_name,
            'event_date'=>$request->event_date,
            
            'address'=>$request->address,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'party_name'=>$request->party_name,
            'organized_by'=>$request->organized_by,
            'arrangement'=>$request->arrangement,
            'job_no'=>'event-'.$dateString,
        ];
        if($request->event_factor){
            $data['event_factor'] = $request->event_factor;
        }
        $r = Event::create($data);
        if($r){
            Session::put('eventAdded', 'eventAdded');
            return back()->with('success','Your Event Has been created successfully');
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
        $e = Event::find($id);
        $event = Event::latest()->get();
        return view('aahar.event.edit',compact('event','e'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $e = Event::find($id);
        $data = [
            'event_name'=>$request->event_name,
            'event_date'=>$request->event_date,
            
            'address'=>$request->address,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'party_name'=>$request->party_name,
            'organized_by'=>$request->organized_by,
            'arrangement'=>$request->arrangement,
            'event_factor'=>$request->event_factor,
        ];
        $r = $e->update($data);
        if($r){
            return redirect()->route('event.index')->with('success','Your Event Has been updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $e = Event::find($id);
        $r = $e->delete();
        if($r){
            return redirect()->route('event.index')->with('success','Your Event Has been deleted successfully');
        }
    }
}
