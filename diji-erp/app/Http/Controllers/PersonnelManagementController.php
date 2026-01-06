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
use App\Models\EmploymentStatus;
use App\Models\EducationLevel;
use App\Models\Profession;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

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

        $employees = DB::table("employees")
            ->leftJoin(
                "departments",
                "employees.department_id",
                "=",
                "departments.id"
            )
            ->leftJoin(
                "positions",
                "employees.position_id",
                "=",
                "positions.id"
            )
            ->leftJoin(
                "employment_types",
                "employees.employment_type_id",
                "=",
                "employment_types.id"
            )
            ->where("employees.company_id", $companyId)
            ->select([
                "employees.id",
                "employees.first_name",
                "employees.last_name",
                "employees.email",
                "employees.employee_code",
                "employees.sgk_start_date",
                "employees.employment_status_id",
                "departments.name as department_name",
                "positions.name as position_name",
                "employment_types.name as employment_type_name",
            ]);

        return DataTables::of($employees)
            ->addColumn("personel", function ($row) {
                $initial = strtoupper(substr($row->first_name, 0, 1));

                return '
            <div class="d-flex align-items-center">
                <div class="avatar-sm me-2">
                    <span class="avatar-title bg-soft-primary rounded-circle">' .
                    $initial .
                    '</span>
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
            </div>';
            })
            ->addColumn("department", fn($row) => $row->department_name ?? "-")
            ->addColumn("position", fn($row) => $row->position_name ?? "-")
            ->addColumn(
                "employment_type",
                fn($row) => $row->employment_type_name ?? "-"
            )
            ->addColumn("start_date", function ($row) {
                return $row->sgk_start_date
                    ? date("d.m.Y", strtotime($row->sgk_start_date))
                    : "-";
            })
            ->addColumn("status", function ($row) {
                return $row->employment_status_id == 1
                    ? '<span class="badge bg-success">Aktif</span>'
                    : '<span class="badge bg-danger">Pasif</span>';
            })
            ->addColumn("action", function ($row) {
                return '<a href="' .
                    route("employee-management.edit", $row->id) .
                    '" class="btn btn-sm btn-soft-primary">Detay</a>
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
            $newEmployee->tc_identity_number =
                $request->tc_identity_number ?? "00000000000";
            $newEmployee->gender = $request->gender ?? "";
            $newEmployee->birth_date = $request->birth_date ?? "2000-01-01";
            $newEmployee->birth_place = $request->birth_place ?? "";
            $newEmployee->marital_status =
                $request->marital_status ?? "Bilinmiyor";
            $newEmployee->nationality_id = $request->nationality ?? 1;
            $newEmployee->department_id = $request->department_id ?? 1;
            $newEmployee->position_id = $request->position_id ?? 1;
            $newEmployee->manager_id = null;
            $newEmployee->employment_type_id =
                $request->employment_type_id ?? 1;
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
            $newEmployee->education_level_id =
                $request->education_level_id ?? 1;
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
            $newEmployee->emergency_contact_name =
                $request->emergency_contact_name ?? "";
            $newEmployee->emergency_contact_phone =
                $request->emergency_contact_phone ?? "";
            $newEmployee->emergency_contact_relation =
                $request->emergency_contact_relation ?? "";
            $newEmployee->save();

            // Kullanıcı Hesabı Oluştur
            $newUser = new User();
            $newUser->company_id = $companyId;
            $newUser->employee_id = $newEmployee->id;
            $newUser->email = $request->email;
            $newUser->password = Hash::make("diji2025");
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
    // Personel Detay Sayfası
    public function edit($id)
    {
        $companyId = auth()->user()->company_id;
        $employee = Employees::with("position", "employmentStatus")
            ->where("id", $id)
            ->first();
        $positions = Position::where("company_id", "=", $companyId)->get();
        $departments = Department::where("company_id", "=", $companyId)->get();
        $positions = Position::where("company_id", "=", $companyId)->get();
        $employmentStatues = EmploymentStatus::all();
        $employees = Employees::where("company_id", "=", $companyId)->get();
        return view(
            "human-resources.personnel-management.edit",
            compact(
                "employee",
                "positions",
                "departments",
                "positions",
                "employmentStatues",
                "employees"
            )
        );
    }
    // Profil Bilgilerini Güncelleme İşlemi
    public function profileUpdate(Request $request, $id)
    {
        try {
            $employee = Employees::findOrFail($id);

            // Profil Resim kontrolü
            if ($request->hasFile("avatar")) {
                $avatar = $request->file("avatar");
                $avatarName = time() . "_" . $avatar->getClientOriginalName();
                $avatar->move(public_path("uploads/avatars"), $avatarName);
                $employee->avatar = $avatarName;
            }

            $employee->first_name = $request->name;
            $employee->last_name = $request->surname;
            $employee->employee_code = $request->employee_code;
            $employee->position_id = $request->position_id;
            $employee->department_id = $request->department_id;
            $employee->manager_id = $request->manager_id;
            $employee->employment_status_id = $request->employment_status_id;
            $employee->save();

            return response()->json([
                "success" => true,
                "message" => "Profil güncellendi.",
            ]);
        } catch (\Throwable $th) {
            Log::error("Profil güncelleme hatası: " . $th->getMessage());
            return response()->json([
                "success" => false,
                "message" => "Hata oluştu: " . $th->getMessage(),
            ]);
        }
    }
}
