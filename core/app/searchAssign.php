<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class searchAssign extends Model
{
    protected $fillable = ['id','project_id','user_id','budget','username','supervisor_id','status'];

    protected $table = 'assign_projects';

    protected $primaryKey = 'project_id';
}
