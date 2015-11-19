<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApiKey extends Model
{
    use SoftDeletes;
    protected $table = 'api_keys';
    protected $fillable = [
        'user_id',
        'key',
        'level',
        'ignore_limits'
    ];

    public function owner() {
        return $this->belongsTo(User::class);
    }
}
