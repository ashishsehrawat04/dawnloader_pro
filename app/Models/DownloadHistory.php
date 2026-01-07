<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadHistory extends Model
{
    protected $table = 'download_history';
    protected $fillable = [
        'user_id',
        'url',
        'status',
        'file_path',
        'message'
    ];
}
