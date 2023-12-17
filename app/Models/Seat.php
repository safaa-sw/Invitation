<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'code', 'event_day_id', 'seat_class', 'status', 
    ];

    public function eventDay()
    {
        return $this->belongsTo(EventDay::class);
    }

    public function invited()
    {
        return $this->hasOne(Invited::class);
    }
}
