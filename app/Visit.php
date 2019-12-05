<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = 'visit';

    public function patient() {
        return $this->belongsTo('App\Patient');
    }
    public function doctor() {
        return $this->belongsTo('App\Doctor');
    }
}
