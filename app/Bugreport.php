<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bugreport extends Model
{
    use SoftDeletes;
    protected $table = 'bugreports';
    protected $fillable = [
        'comment',
        'screenshot',
        'email'
    ];
}
