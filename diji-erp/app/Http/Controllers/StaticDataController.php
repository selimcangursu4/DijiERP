<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employees;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class StaticDataController extends Controller
{
  // Personel + Kullanıcı oluştur
    public function employeeCreate()
    {
        DB::transaction(function () {

            // 1️⃣ PERSONEL OLUŞTUR
            $employee = Employees::create([
                'company_id' => 1,
                'employee_code' => 'EMP-0001',

                'first_name' => 'Selimcan ',
                'last_name'  => 'Gürsu',
                'tc_identity_number' => '11111111111',
                'gender' => 'Erkek',
                'birth_date' => '1995-01-01',
                'birth_place' => 'İstanbul',
                'marital_status' => 'Bekar',
                'nationality_id' => 1,

                'department_id' => 1,
                'position_id' => 1,
                'manager_id' => null,
                'employment_type_id' => 1,
                'work_type_id' => 1,
                'employment_status_id' => 1,
                'contract_type_id' => 1,

                'salary_amount' => 35000,
                'currency' => 'TRY',
                'bank_id' => 1,
                'iban' => 'TR000000000000000000000000',

                'sgk_number' => 'SGK123456',
                'sgk_start_date' => now(),
                'insurance_type_id' => 1,

                'education_level_id' => 1,
                'school_name' => 'İstanbul Üniversitesi',
                'graduation_year' => 2018,
                'profession_id' => 1,

                'phone' => '05550000000',
                'email' => 'selimcangursu@wikywatch.com',

                'address' => 'Kadıköy / İstanbul',
                'city_id' => 34,
                'district_id' => 1,
                'postal_code' => '34000',

                'emergency_contact_name' => 'Mehmet Yılmaz',
                'emergency_contact_phone' => '05551111111',
                'emergency_contact_relation' => 'Baba',
            ]);

            // 2️⃣ AUTH KULLANICISI OLUŞTUR
            User::create([
                'company_id' => 1,
                'employee_id' => $employee->id,
                'email' => $employee->email,
                'password' => Hash::make('123456'), // ilk şifre
            ]);
        });

        return redirect()->back()->with('success', 'Personel ve kullanıcı başarıyla oluşturuldu');
    }

}
