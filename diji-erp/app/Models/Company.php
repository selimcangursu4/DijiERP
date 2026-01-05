<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'name',
        'code',
        'tax_number',
        'tax_office',
        'email',
        'phone',
        'address',
        'city_id',
        'district_id',
        'status'
    ];
}
