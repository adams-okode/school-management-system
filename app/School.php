<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'school';

    protected $fillable = ['name', 'school_name', 'status', 'college_id', 'created_at', 'updated_at'];
}
