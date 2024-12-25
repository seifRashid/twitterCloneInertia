<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ideas extends Model
{
    //
    protected $fillable = [
        'content',
        'likes'];

        public function comments(){
            return $this->hasMany(Comment::class);
        }
}
