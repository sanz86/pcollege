<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegeDepartment extends Model
{
    public function courses()
    {
        return $this->belongsToMany('App\CollegeCourse')
                    ->withPivot('season','semester','year')
                    ->withTimeStamps();
    }
}
