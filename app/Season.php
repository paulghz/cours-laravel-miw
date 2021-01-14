<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    public function serie() {
    	return $this->belongsTo(Serie::class);
    }

    public function episodes() {
    	return $this->hasMany(Episode::class);
    }
}
