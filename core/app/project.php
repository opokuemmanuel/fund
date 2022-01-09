<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $fillable = ['userid','project_id','title','description','isBLocked','budget'];

    protected $table = 'projects';
}
