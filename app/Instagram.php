<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instagram extends Model
{
    protected $table = 'instagram';

    protected $fillable = [
        'user_id', 'insta_id', 'access_token',
    ];
}
