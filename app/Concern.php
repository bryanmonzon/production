<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concern extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
