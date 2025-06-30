<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'original_url',
        'short_slug',
        'user_id',
        'clicks',
    ];
}
