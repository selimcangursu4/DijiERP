<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'ilceler';

       public function city()
    {
        return $this->belongsTo(City::class, 'sehir_id');
    }
}
