<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $guarded = ['id'];

	public function user() {
		return $this->belongsTo(User::class)->withTrashed();
	}

    public function commented() {
        return $this->morphTo();
    }
}
