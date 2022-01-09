<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reports extends Model
{
    protected $fillable = ['supervisor_id','project_id','report','message'];
}
