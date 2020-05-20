<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'number',
        'review',
        'website',
        'location',
        'user_id'
    ];
}
