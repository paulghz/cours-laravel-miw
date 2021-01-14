<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public function season() {
    	return $this->belongsTo(Season::class);
    }
}
