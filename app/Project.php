<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function plan()
    {
        return $this->belongsToMany(Plan::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function concerns()
    {
        return $this->hasMany(Concern::class)
            ->orderBy('created_at', 'desc');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
