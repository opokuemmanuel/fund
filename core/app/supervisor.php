<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supervisor extends Model
{
    protected $fillable = ['ids','name','staff_id','gender','date','house_no','work','card','card_no','card_image','photo','password'];

    protected $table = 'supervisors';

}

