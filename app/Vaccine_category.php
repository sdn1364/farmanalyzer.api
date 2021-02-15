<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccine_category extends Model
{
    protected $guarded = [];
    public function vaccines(){
        return $this->hasMany(Vaccine::class);
    }

}
