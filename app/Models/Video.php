<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
   protected $table = 'videos';

    protected $fillable = [
        'user_id',
        'title',
        'source_url',
        'video',
        'size',
        'slug',
        'platform',
        'category'
    ];
}
