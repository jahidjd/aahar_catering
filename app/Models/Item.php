<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $fillable = [
        'id',
        'category_id',
        'item_name',
        'avg_per_head_qunatity',
        'unit_of_measurement',
    ];

    function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    function ingredient(){
        return $this->hasMany(Ingredient::class,'id','item_id');
    }
    function orders(){
        return $this->hasMany(Order::class,'id','item_id');
    }
}
