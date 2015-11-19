<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes, RecordsActivity;

    protected $table = 'categories';
    protected $fillable = [
        'title',
        'content'
    ];

    protected static $recordEvents = ['created'];
}
