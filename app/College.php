<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $table = 'college';

    protected $fillable = ['name', 'status', 'campus_id', 'created_at', 'updated_at'];
}
