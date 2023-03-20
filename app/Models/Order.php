<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'item_id',
        'category_id',
        'party_name',
        'menu_name',
        'number_of_attendees',
        'number_of_veg',
    ];

  
    function item(){
        return $this->belongsTo(Item::class,'item_id','id');
    }
    function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    function party(){
        return $this->belongsTo(Event::class,'party_name','id');
    }
}
