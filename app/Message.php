<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'user1', 'user2', 'body'
    ];
    public function sender(){
        return $this->belongsTo('App\User', 'user1', 'id');
    }
    public function receiver(){
        return $this->belongsTo('App\User', 'user2', 'id');
    }
}
