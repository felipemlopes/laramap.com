<?php

namespace App;

use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;
use PackageBackup\Friendable\Models\Friend;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

use Mpociot\Teamwork\Traits\UserHasTeams;
use PackageBackup\Friendable\Contracts\Friendable;
use PackageBackup\Watchable\Contracts\Watchable;
use PackageBackup\Reportable\Contracts\Reportable;

use PackageBackup\Reportable\Traits\Reportable as ReportableTrait;
use PackageBackup\Friendable\Traits\Friendable as FriendableTrait;
use PackageBackup\Rewardable\Traits\Rewardable as RewardableTrait;

use PackageBackup\Watchable\Traits\Watchable as WatchableTrait;

use Laravel\Cashier\Billable;
use Laravel\Cashier\Contracts\Billable as BillableContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract, Reportable, Friendable, Watchable, BillableContract
{
    use Authenticatable, Authorizable, CanResetPassword, SoftDeletes, AlgoliaEloquentTrait, ReportableTrait, FriendableTrait, RewardableTrait, WatchableTrait, Billable, UserHasTeams;

    public $algoliaSettings = [
        'attributesToIndex' => [
            'id',
            'name',
            'location',
            'username',
            'avatar',
            'website',
            'github_profile',
            'twitter_profile',
            'hireable',
            'latitude',
            'longitude',
        ],
        'customRanking' => [
            'desc(id)',
            'asc(username)',
        ],
    ];

    public static $autoIndex = true;
    public static $autoDelete = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'github_id',
        'avatar',
        'location',
        'github_profile',
        'twitter_profile',
        'hireable',
        'website',
        'is_admin',
        'is_partner',
        'is_sponsor',
        'is_sitepoint',
        'bio',
        'skill_laravel',
        'skill_frontend',
        'skill_backend',
        'skill_mobile',
        'latitude',
        'longitude',
        'settings'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'github_id', 'stripe_active', 'stripe_id', 'stripe_subscription', 'stripe_plan', 'last_four', 'trial_ends_at', 'subscription_ends_at'];

    protected $dates = ['trial_ends_at', 'subscription_ends_at'];

    protected $casts = [
        'settings' => 'json'
    ];

    public function articles() {
        return $this->hasMany(Article::class);
    }

    public function tutorials() {
        return $this->hasMany(Tutorial::class);
    }

    public function projects() {
        return $this->hasMany(Project::class);
    }

    public function meetups() {
        return $this->hasMany(Meetup::class);
    }

    public function settings() {
        return new UserSettings($this->settings, $this);
    }

    public function activity()
    {
        return $this->hasMany(Activity::class)
            ->with(['user', 'subject'])
            ->limit(10)
            ->latest();
    }

    public function recordActivity($name, $related)
    {
        if (! method_exists($related, 'recordActivity')) {
            throw new \Exception('..');
        }
        return $related->recordActivity($name);
    }

    public function getSearchableBody()
    {
        $searchableProperties = [
            'name' => $this->name,
            'username' => $this->username,
            'location' => $this->location
        ];

        return $searchableProperties;

    }

    public function getSearchableType()
    {
        return 'user';
    }

    public function getSearchableId()
    {
        return $this->id;
    }

    public function orders() {
        return $this->hasMany(ShopOrder::class);
    }

    public function apiKey() {
        return $this->hasOne(ApiKey::class);
    }
    
}
