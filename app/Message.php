<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
    	'from_id', 'to_id', 'content'
    ];

    public function from() {
    	$this->belongsTo(User::class, 'from_id');
    }

    public function to() {
    	$this->belongsTo(User::class, 'to_id');
    }

}
