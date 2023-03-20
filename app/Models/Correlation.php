<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correlation extends Model
{
    use HasFactory;
    protected $table = 'correlations';
    protected $fillable = [
        'category_id',
        'item_id',
        'ratio',
    ];
    function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
