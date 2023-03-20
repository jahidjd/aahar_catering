<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventMenu extends Model
{
    use HasFactory;
    protected $table = 'event_menus';
    protected $fillable = [
        'event_id',
        'menu_name',
        'number_of_attendees',
    ];
    function event(){
        return $this->belongsTo(Event::class,'event_id','id');
    }
    function orders(){
        return $this->hasMany(Order::class,'id','menu_id');
    }
}
