<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeFolder extends Model
{
     protected $fillable = ['company_id', 'employee_id', 'name'];

    public function files()
    {
        return $this->hasMany(EmployeeFile::class, 'folder_id');
    }
}
