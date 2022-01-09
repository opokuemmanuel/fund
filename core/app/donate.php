<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class donate extends Model
{
    protected $fillable = ['project_title','author','required_amount','amount_donated'];
}
