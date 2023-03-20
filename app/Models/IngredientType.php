<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientType extends Model
{
    use HasFactory;
    protected $table = 'ingredient_types';
    protected $fillable = [
        'type',
        'description'
    ];
    function ingredient(){
        return $this->hasMany(Ingredient::class,'id','ingredient_type_id');
    }
}
