<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\CalendarUtils;

class Andata extends Model
{
    protected $guarded = [];

    public function herd()
    {
        return $this->belongsTo(Herd::class);
    }

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class);
    }
    public function vaccine_method()
    {
        return $this->belongsTo(Vaccine_method::class);
    }
    public function vaccine_company()
    {
        return $this->belongsTo(Vaccine_company::class);
    }
}
