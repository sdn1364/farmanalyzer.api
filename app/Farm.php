<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $guarded = [];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }
    public function province(){
        return $this->belongsTo(Province::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function expert(){
        return $this->belongsTo(Expert::class);
    }
    public function workers(){
        return $this->hasMany(Worker::class);
    }
}
