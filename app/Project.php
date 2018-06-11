<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function plan()
    {
        return $this->belongsToMany(Plan::class);
    }
}
