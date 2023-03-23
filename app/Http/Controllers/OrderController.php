<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventMenu;
use App\Models\Item;
use App\Models\Category;
use App\Models\Event;
use App\Models\Order;
use App\Models\Correlation;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = EventMenu::get();
        $item = Item::get();
        $category = Category::get();
        $event = Event::get();
        return view('aahar.order.index',compact('menu','item','category','event'));
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
        $itms = array_unique($request->item_hidden);
        $unique = array();

        foreach ($itms as $value)
        {
            $unique[] = $value;
        }
        
        $itms_val = array_values($unique);
        $item_category = $request->item_category;
        $data = array();
        
        foreach($item_category as $key => $value)
        {
            $checker = Correlation::where(['category_id' => $request->item_category[$key], 'item_id' => $itms_val[$key]])->first();
            $itms_arr = explode(',', $itms_val[$key]);
            $item_all = Item::whereIn('id', $itms_arr)->get('avg_per_head_qunatity');
            $avg_qty = array();

            foreach ($item_all as $value)
            {
                $avg_qty[] = $value->avg_per_head_qunatity;
            }
            
            $avg_qty_arr = array_values($avg_qty);
            $avg_qty_val = implode(',', $avg_qty_arr);

            if($checker == null){
                if(!empty($value))
                {
                    $data[] =[
                        'item_id' => $request->item_hidden[$key],
                        'category_id' => $request->item_category[$key],
                        'party_name' => $request->party_name,
                        'menu_name' => $request->menu_name,
                        'number_of_attendees' => $request->number_of_attendees,
                        'number_of_veg' => $request->number_of_veg,
                        'original_per_head_qunatity' => $avg_qty_val,
                        'effective_per_head_qunatity' => NULL,
                    ];                 
                }
            }
        }

        Order::insert($data);

        $lastId = Order::orderByDesc('id')->first()->id;
        $ids = range($lastId - count($data) + 1, $lastId);
        $order_ids = implode(',', $ids);
   
        if(count($data) > 0){
            return view('aahar.correlation.index',compact('data','order_ids'))->with('success','Your Given Item Added Successfully!');
        }else{
            return redirect('/order')->back()->with('error','Something went Wrong!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function addCorrelation(Request $request){
        $itms = array_unique($request->item_id);

        $unique = array();

        foreach ($itms as $value)
        {
            $unique[] = $value;
        }
        
        $itms_val = array_values($unique);
        $category_val = $request->category_id;
        $data = array();
        
        foreach($category_val as $key => $value)
        {
            if(!empty($value))
            {
                $data[] =[
                    'category_id' => $request->category_id[$key],
                    'item_id' => $itms_val[$key],
                    'ratio' => $request->ratio[$key],
                ];                 
            }

            $order_ids_arr = explode(',', $request->order_ids);

            foreach($order_ids_arr as $key=>$id){
                Order::where('id',$id)->update([
                    'effective_per_head_qunatity' => $request->ratio[$key],
                ]);
            }
        }

        Correlation::insert($data);
        
        if(count($data) > 0){
            $request->session()->forget('eventAdded');
            return redirect()->route('order.index')->with('success','Food Correlation Added Successfully!');
        }else{
            return redirect('/addCorrelation')->back()->with('error','Something went Wrong!');
        }  
    }

    function selectItem(Request $request){
        $items = Item::where('category_id',$request->cat_id)->get();
        return $items;
    }
}
