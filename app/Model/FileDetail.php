<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FileDetail extends Model
{
    protected $fillable = ['title','description','folder','file','file_type','mime'];
}
