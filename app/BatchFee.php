<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BatchFee extends Model
{
    //
    protected $table='batch_fees';

    public function batch()
    {
        return $this->belongsTo('\App\Batch');
    }
}
