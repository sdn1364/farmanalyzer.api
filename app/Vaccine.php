<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $guarded = [];

    public function vaccine_category()
    {
        return $this->belongsTo(Vaccine_category::class);
    }
}
