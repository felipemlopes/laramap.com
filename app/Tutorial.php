<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use PackageBackup\Reviewable\Contracts\Reviewable;
use PackageBackup\Reviewable\Traits\Reviewable as ReviewableTrait;
use PackageBackup\Reportable\Contracts\Reportable;
use PackageBackup\Reportable\Traits\Reportable as ReportableTrait;
use PackageBackup\Likeable\Contracts\Likeable;
use PackageBackup\Likeable\Traits\Likeable as LikeableTrait;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Tutorial extends Model implements Reviewable, Reportable, Likeable, SluggableInterface
{
    use SoftDeletes, RecordsActivity, ReviewableTrait, ReportableTrait, LikeableTrait, SluggableTrait;

    protected $table = 'tutorials';
    protected $fillable = [
        'title',
        'content'
    ];

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

    protected static $recordEvents = ['created', 'updated'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tags() {
        return $this->hasMany(Tag::class);
    }

    public function categories() {
        return $this->hasMany(Category::class);
    }
}
