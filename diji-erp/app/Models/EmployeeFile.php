<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeFile extends Model
{
     protected $fillable = ['folder_id', 'file_name', 'file_path'];

    public function folder()
    {
        return $this->belongsTo(EmployeeFolder::class, 'folder_id');
    }
}
