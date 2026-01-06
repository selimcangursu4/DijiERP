<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = 'employees';

       protected $fillable = [
        'company_id',
        'employee_code',

        'first_name',
        'last_name',
        'tc_identity_number',
        'gender',
        'birth_date',
        'birth_place',
        'marital_status',
        'nationality_id',

        'department_id',
        'position_id',
        'manager_id',
        'employment_type_id',
        'work_type_id',
        'employment_status_id',
        'contract_type_id',

        'salary_amount',
        'currency',
        'bank_id',
        'iban',

        'sgk_number',
        'sgk_start_date',
        'sgk_end_date',
        'insurance_type_id',

        'education_level_id',
        'school_name',
        'graduation_year',
        'profession_id',
        'certificates',

        'phone',
        'alternative_phone',
        'email',

        'address',
        'city_id',
        'district_id',
        'postal_code',

        'emergency_contact_name',
        'emergency_contact_phone',
        'emergency_contact_relation'
    ];

    public function department()
    {
      return $this->belongsTo(Department::class);
    }
    public function position()
    {
      return $this->belongsTo(Position::class, 'position_id');
    }
    public function employmentType()
    {
      return $this->belongsTo(EmploymentType::class);
    }
    public function employmentStatus()
    {
      return $this->belongsTo(EmploymentStatus::class, 'employment_status_id');
    }

}
