<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegeCourse extends Model
{
    public function departments()
    {
        return $this->belongsToMany('App\CollegeDepartment')
                    ->withPivot('season','semester','year')
                    ->withTimeStamps();
    }
}
