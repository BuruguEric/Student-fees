<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $table = "fees";

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
