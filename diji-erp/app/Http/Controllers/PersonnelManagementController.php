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
use App\Models\User;
use App\Models\EducationLevel;
use App\Models\Profession;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class PersonnelManagementController extends Controller
{
    // Personel İndex Sayfası
    public function index()
    {
        return view("human-resources.personnel-management.index");
    }
    // Personelleri Listele
    public function fetch(Request $request)
    {
        $companyId = auth()->user()->company_id;

        $employees = Employees::with(["department", "position"])
            ->where("company_id", $companyId)
            ->select("employees.*");

        return DataTables::of($employees)
            ->addColumn("personel", function ($row) {
                return '
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm me-2">
                            <span class="avatar-title bg-soft-primary rounded-circle">
                                ' .
                    strtoupper(substr($row->first_name, 0, 1)) .
                    '
                            </span>
                        </div>
                        <div>
                            <strong>' .
                    $row->first_name .
                    " " .
                    $row->last_name .
                    '</strong><br>
                            <small class="text-muted">' .
                    ($row->email ?? "-") .
                    '</small>
                        </div>
                    </div>
                ';
            })
            ->addColumn("department", fn($row) => $row->department->name ?? "-")
            ->addColumn("position", fn($row) => $row->position->name ?? "-")
            ->addColumn(
                "employment_type",
                fn($row) => $row->employmentType->name ?? "-"
            )
            ->addColumn(
                "start_date",
                fn($row) => $row->start_date?->format("d.m.Y")
            )
            ->addColumn("status", function ($row) {
                return $row->employment_status_id == 1
                    ? '<span class="badge bg-success">Aktif</span>'
                    : '<span class="badge bg-danger">Pasif</span>';
            })
            ->addColumn("action", function ($row) {
                return '
                    <a href="#" class="btn btn-sm btn-soft-primary">Detay</a>
                    <a href="#" class="btn btn-sm btn-soft-warning">Düzenle</a>
                ';
            })
            ->rawColumns(["personel", "status", "action"])
            ->make(true);
    }
    // Personel Ekleme Sayfası
    public function create()
    {
        $companyId = auth()->user()->company_id;
        $departments = Department::where("company_id", "=", $companyId)->get();
        $positions = Position::where("company_id", "=", $companyId)->get();
        $employmentTypes = EmploymentType::all();
        $workTypes = WorkType::all();
        $contractTypes = ContractType::all();
        $insuranceTypes = InsuranceType::all();
        $banks = Bank::all();
        $countries = Country::all();
        $cities = City::all();
        $districts = District::all();
        $educationLevels = EducationLevel::all();
        $professions = Profession::all();

        return view(
            "human-resources.personnel-management.create",
            compact(
                "departments",
                "positions",
                "employmentTypes",
                "employmentTypes",
                "workTypes",
                "contractTypes",
                "banks",
                "insuranceTypes",
                "countries",
                "cities",
                "districts",
                "educationLevels",
                "professions"
            )
        );
    }
    // Personel Ekleme İşlemi
    public function store(Request $request)
    {
        try {
            // Personeli Veritabanına Kaydet
            $companyId = auth()->user()->company_id;
            $newEmployee = new Employees();

            $newEmployee->company_id = $companyId;
            $newEmployee->employee_code = "EMP-" . time();

            $newEmployee->first_name = $request->first_name ?? "";
            $newEmployee->last_name = $request->last_name ?? "";
            $newEmployee->tc_identity_number = $request->tc_identity_number ?? "00000000000";
            $newEmployee->gender = $request->gender ?? "";
            $newEmployee->birth_date = $request->birth_date ?? "2000-01-01";
            $newEmployee->birth_place = $request->birth_place ?? "";
            $newEmployee->marital_status = $request->marital_status ?? "Bilinmiyor";
            $newEmployee->nationality_id = $request->nationality ?? 1;
            $newEmployee->department_id = $request->department_id ?? 1;
            $newEmployee->position_id = $request->position_id ?? 1;
            $newEmployee->manager_id = null;
            $newEmployee->employment_type_id = $request->employment_type_id ?? 1;
            $newEmployee->work_type_id = $request->work_type_id ?? 1;
            $newEmployee->employment_status_id = 1;
            $newEmployee->contract_type_id = $request->contract_type_id ?? 1;
            $newEmployee->salary_amount = $request->salary ?? 0;
            $newEmployee->currency = $request->salary_currency ?? "TRY";
            $newEmployee->bank_id = $request->bank_id ?? 1;
            $newEmployee->iban = $request->iban ?? "";
            $newEmployee->sgk_number = $request->sgk_registration_number ?? "";
            $newEmployee->sgk_start_date = $request->sgk_entry_date ?? now();
            $newEmployee->sgk_end_date = $request->sgk_exit_date ?? null;
            $newEmployee->insurance_type_id = $request->insurance_type_id ?? 1;
            $newEmployee->education_level_id = $request->education_level_id ?? 1;
            $newEmployee->school_name = $request->last_school_id ?? "";
            $newEmployee->graduation_year = $request->graduation_date
                ? date("Y", strtotime($request->graduation_date))
                : now()->year;
            $newEmployee->profession_id = $request->profession_id ?? 1;
            $newEmployee->certificates = null;
            $newEmployee->phone = $request->phone ?? "0000000000";
            $newEmployee->alternative_phone = $request->phone_secondary ?? null;
            $newEmployee->email = $request->email ?? null;
            $newEmployee->address = $request->address ?? "";
            $newEmployee->city_id = $request->city_id ?? 1;
            $newEmployee->district_id = $request->district_id ?? 1;
            $newEmployee->postal_code = $request->postal_code ?? "00000";
            $newEmployee->emergency_contact_name = $request->emergency_contact_name ?? "";
            $newEmployee->emergency_contact_phone = $request->emergency_contact_phone ?? "";
            $newEmployee->emergency_contact_relation = $request->emergency_contact_relation ?? "";
            $newEmployee->save();

            // Kullanıcı Hesabı Oluştur
             $newUser = new User();
             $newUser->company_id  = $companyId;
             $newUser->employee_id = $newEmployee->id;
             $newUser->email       = $request->email;
             $newUser->password    = Hash::make('diji2025');
             $newUser->save();

            return response()->json([
                "success" => true,
                "id" => $newEmployee->id,
            ]);
        } catch (\Throwable $th) {
            Log::error("Employee Store Error", [
                "user_id" => auth()->id(),
                "company_id" => auth()->user()->company_id ?? null,
                "error_message" => $th->getMessage(),
                "trace" => $th->getTraceAsString(),
                "request_data" => $request->all(),
            ]);

            return response()->json(
                [
                    "success" => false,
                    "error" => "Bir hata oluştu. Lütfen tekrar deneyiniz.",
                ],
                500
            );
        }
    }
}
