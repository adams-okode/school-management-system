<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    //
    protected $fillable=['Exam_Status'];

    public function payments()
    {
        # code...
        return $this->hasMany('\App\FeePayment','admission_number');
    }
}
