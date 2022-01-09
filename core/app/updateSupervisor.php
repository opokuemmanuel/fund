<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class updateSupervisor extends Model
{
    protected $fillable = ['ids','name','staff_id','gender','date','house_no','work','card','card_no','card_image','photo'];

    protected $primaryKey = 'ids';

    protected $table = 'supervisors';


}
