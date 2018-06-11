<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $guarded = [];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
