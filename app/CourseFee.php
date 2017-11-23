<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseFee extends Model
{
    //
    protected $table='course_fees';

    public function course()
    {
        return $this->belongsTo('\App\Courses');
    }
}
