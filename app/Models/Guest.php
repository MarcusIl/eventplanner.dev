<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'guest_name',
        'guest_email',
        'guest_rsvp',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
