<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsuranceType extends Model
{
    protected $table = 'insurance_types';

    protected $fillable = [
        'name',
        'code',
        'description'
    ];
}
