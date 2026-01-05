<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [
        'company_id',
        'name',
        'code',
        'description',
        'status'
    ];
}

