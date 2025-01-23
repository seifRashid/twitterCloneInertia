<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileData extends Model
{
    //
    protected $fillable = [
        'bio',
        'image',
        'user_id'
    ];

    public function user(){
        return $this->hasOne(User::class);
    }
}
