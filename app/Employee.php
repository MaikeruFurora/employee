<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded=[];

    public function record()
    {
    	return $this->hasMany(Record::class);
    }
}
