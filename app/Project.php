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
}
