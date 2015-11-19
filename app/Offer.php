<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model implements SluggableInterface
{
    use SoftDeletes, SluggableTrait;

    protected $table = 'offers';
    protected $fillable = [
        'title',
        'content',
        'slug',
        'url',
        'code',
        'description',
        'image'
    ];

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

}
