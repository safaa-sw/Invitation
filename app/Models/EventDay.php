<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'holl', 'image', 'address',
    ];

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
