<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Department;
use App\Models\Position;
use App\Models\WorkType;
use App\Models\EmploymentType;
use App\Models\ContractType;
use App\Models\Country;
use App\Models\City;
use App\Models\District;
use App\Models\InsuranceType;
use App\Models\Bank;
use App\Models\EducationLevel;
use App\Models\Profession;


use Yajra\DataTables\DataTables;


class PersonnelManagementController extends Controller
{
    // Personel İndex Sayfası
    public function index()
    {
        return view('human-resources.personnel-management.index');
    }
    // Personelleri Listele
    public function fetch(Request $request)
    {
        $companyId = auth()->user()->company_id;

        $employees = Employees::with(['department', 'position'])
            ->where('company_id', $companyId)
            ->select('employees.*');

        return DataTables::of($employees)
            ->addColumn('personel', function ($row) {
                return '
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm me-2">
                            <span class="avatar-title bg-soft-primary rounded-circle">
                                ' . strtoupper(substr($row->first_name, 0, 1)) . '
                            </span>
                        </div>
                        <div>
                            <strong>' . $row->first_name . ' ' . $row->last_name . '</strong><br>
                            <small class="text-muted">' . ($row->email ?? '-') . '</small>
                        </div>
                    </div>
                ';
            })
            ->addColumn('department', fn ($row) => $row->department->name ?? '-')
            ->addColumn('position', fn ($row) => $row->position->name ?? '-')
            ->addColumn('employment_type', fn ($row) => $row->employmentType->name ?? '-')
            ->addColumn('start_date', fn ($row) => $row->start_date?->format('d.m.Y'))
            ->addColumn('status', function ($row) {
                return $row->employment_status_id == 1
                    ? '<span class="badge bg-success">Aktif</span>'
                    : '<span class="badge bg-danger">Pasif</span>';
            })
            ->addColumn('action', function ($row) {
                return '
                    <a href="#" class="btn btn-sm btn-soft-primary">Detay</a>
                    <a href="#" class="btn btn-sm btn-soft-warning">Düzenle</a>
                ';
            })
            ->rawColumns(['personel', 'status', 'action'])
            ->make(true);
    }
    // Personel Ekleme Sayfası
    public function create()
    {
        $companyId = auth()->user()->company_id;
        $departments = Department::where('company_id',"=",$companyId)->get();
        $positions = Position::where('company_id',"=",$companyId)->get();
        $employmentTypes = EmploymentType::all();
        $workTypes = WorkType::all();
        $contractTypes = ContractType::all();
        $insuranceTypes  = InsuranceType::all();
        $banks = Bank::all();
        $countries = Country::all();
        $cities = City::all();
        $districts = District::all();
        $educationLevels = EducationLevel::all();
        $professions = Profession::all();

        return view('human-resources.personnel-management.create',compact('departments','positions','employmentTypes','employmentTypes','workTypes','contractTypes','banks','insuranceTypes','countries','cities','districts','educationLevels','professions'));
    }
}
