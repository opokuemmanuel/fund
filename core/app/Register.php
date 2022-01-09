<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $fillable = ['userid','username','email','isVerified','dob','isBlocked'];

    protected $table = 'registers';
}
