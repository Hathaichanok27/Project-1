<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = [
        'id', 'title', 'start_event', 'end_event'
    ];
}
