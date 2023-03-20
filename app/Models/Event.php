<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [
        'event_name',
        'event_date',
        'event_factor',
        'address',
        'phone',
        'email',
        'party_name',
        'job_no',
        'organized_by',
        'arrangement',
        
    ];
    function eventMenu(){
        return $this->hasMany(EventMenu::class,'id','event_id');
    }
    function orders(){
        return $this->hasMany(Order::class,'id','party_name');
    }
}
