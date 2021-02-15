<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    protected $guarded = [];
    public function getFullNameAttribute(){
        return $this->name.' '.$this->surname;
    }
}
