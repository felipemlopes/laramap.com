<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes, RecordsActivity;

    protected $table = 'tags';
    protected $fillable = [
        'title',
    ];

    protected static $recordEvents = ['created'];
}
