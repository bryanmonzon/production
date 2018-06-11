<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
