<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $fillable = ['userid','message','project_id'];

    protected $table = 'comments';
}
