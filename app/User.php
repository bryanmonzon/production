<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['avatar'];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function concerns()
    {
        return $this->hasMany(Concern::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function avatar()
    {
        return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?s=45&d=mm';
    }

    public function getAvatarAttribute()
    {
        return $this->avatar();
    }
}
