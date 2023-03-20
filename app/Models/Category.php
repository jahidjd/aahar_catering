<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table ='categories';
    protected $fillable = ['name','description'];

    function item(){
        return $this->hasMany(Item::class,'id','category_id');
    }
    function orders(){
        return $this->hasMany(Order::class,'id','category_id');
    }
    function correlation(){
        return $this->hasMany(Correlation::class,'id','category_id');
    }
}
