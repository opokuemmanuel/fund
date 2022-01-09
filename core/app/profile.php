<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $fillable = ['id','user_id','username','user_image','status','admin_id'];

    protected $table = 'profile';

}
