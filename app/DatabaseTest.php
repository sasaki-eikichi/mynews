<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatabaseTest extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
