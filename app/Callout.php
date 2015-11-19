<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Callout extends Model
{
    use SoftDeletes;

    protected $table = 'callouts';
    protected $fillable = [
        'title',
        'description',
        'url'
    ];
}
