<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Herd extends Model
{
    protected $guarded = [];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }
}
