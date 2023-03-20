<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $table = 'ingredients';
    protected $fillable = [
        'item_id',
        'ingredient_type_id',
        'name',
        'quantity_per_unit',
        'unit_of_quantity',
        
    ];

    function item(){
        return $this->belongsTo(Item::class,'item_id','id');
    }
    function ingredient_type(){
        return $this->belongsTo(IngredientType::class,'ingredient_type_id','id');
    }
}
