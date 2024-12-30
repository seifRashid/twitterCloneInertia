<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment',
        'ideas_id',
        'user_id',
    ];

    //define relationship, comment belongs to ideas model
    public function ideas()
    {
        return $this->belongsTo(Ideas::class);
    }

}
