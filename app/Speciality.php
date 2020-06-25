<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $table = 'specialities';

    public function users()
    {
        return $this->hasMany('App\User','speciality_id');
    }
}
