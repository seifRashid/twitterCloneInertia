<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ideas extends Model
{
    //
    protected $fillable = [
        'content',
        'likes',
        'user_id'
    ];

        public function comments(){
            return $this->hasMany(Comment::class);
        }

        public function user(){
            return $this->belongsTo(User::class);
        }
}
