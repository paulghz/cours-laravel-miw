<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{

	//protected $fillable = ['title', 'released_at', 'creator_name'];

	protected $guarded = ['id'];

    public function seasons() {
    	return $this->hasMany(Season::class);
    }

    public function actors() {
    	return $this->belongsToMany(Actor::class);
    }
}
