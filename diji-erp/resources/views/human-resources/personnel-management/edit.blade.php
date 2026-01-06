@extends('partials.master')

@section('main')
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header bg-light p-0">

                <ul class="nav nav-tabs nav-justified">

                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="modal" data-bs-target="#tasksModal" type="button">
                            <i class="bi bi-list-task me-1"></i> Görevler
                        </button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="modal" data-bs-target="#calendarModal" type="button">
                            <i class="bi bi-calendar-event me-1"></i> Takvim
                        </button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="modal" data-bs-target="#diskModal" type="button">
                            <i class="bi bi-folder2-open me-1"></i> Disk
                        </button>
                    </li>

                </ul>

            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <strong>Profil</strong>
                        <a class="text-primary" role="button" data-bs-toggle="modal"
                            data-bs-target="#editProfilModal">Düzenle</a>

                    </div>
                    <div class="card-body">
                        <img src="{{ $employee->profile_photo }}" class="rounded-circle mb-3">
                        <h5>{{ $employee->first_name }} {{ $employee->last_name }}</h5>
                        <p class="text-muted">{{ $employee->position->name ?? 'Pozisyon Yok' }}</p>


                        <span class="badge bg-success">
                            {{ $employee->employmentStatus->name ?? 'Durum Yok' }}
                        </span>
                        <hr>

                        <div class="text-start small">
                            <p><strong>Sicil No:</strong> {{ $employee->employee_code }}</p>
                            <p><strong>Departman:</strong> {{ $employee->department_id }}</p>
                            <p><strong>Yönetici:</strong> {{ $employee->manager_id }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <strong>Kişisel Bilgiler</strong>
                        <a class="text-primary" role="button" data-bs-toggle="modal"
                            data-bs-target="#editPersonalModal">Düzenle</a>

                    </div>
                    <div class="card-body row small">
                        <div class="col-md-6"><strong>TC:</strong> {{ $employee->tc_identity_number }}</div>
                        <div class="col-md-6"><strong>Cinsiyet:</strong> {{ $employee->gender }}</div>
                        <div class="col-md-6">
                            <strong>Doğum Tarihi:</strong>
                            {{ \Carbon\Carbon::parse($employee->birth_date)->format('d-m-Y') }}
                        </div>

                        <div class="col-md-6"><strong>Doğum Yeri:</strong> {{ $employee->birth_place }}</div>
                        <div class="col-md-6"><strong>Medeni Durum:</strong> {{ $employee->marital_status }}</div>
                        <div class="col-md-6">
                            <strong>Uyruk:</strong> {{ $employee->nationality->baslik ?? '-' }}
                        </div>

                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <strong>İletişim Bilgileri</strong>
                        <a class="text-primary" role="button" data-bs-toggle="modal"
                            data-bs-target="#editContactModal">Düzenle</a>
                    </div>
                    <div class="card-body row small">
                        <div class="col-md-6"><strong>Telefon:</strong> {{ $employee->phone }}</div>
                        <div class="col-md-6"><strong>E-Posta:</strong> {{ $employee->email }}</div>
                        <div class="col-md-12"><strong>Adres:</strong> {{ $employee->address }}</div>
                        <div class="col-md-6"><strong>Şehir:</strong> {{ $employee->city ? $employee->city->baslik : '-' }}
                        </div>
                        <div class="col-md-6"><strong>İlçe:</strong>
                            {{ $employee->district ? $employee->district->baslik : '-' }}</div>
                        <div class="col-md-6"><strong>Posta Kodu:</strong> {{ $employee->postal_code }}</div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <strong>Çalışma & Maaş</strong>
                        <a class="text-primary" role="button" data-bs-toggle="modal"
                            data-bs-target="#editWorkModal">Düzenle</a>
                    </div>
                    <div class="card-body row small">
                        <div class="col-md-6"><strong>Çalışma Türü:</strong>
                            {{ $employee->workType ? $employee->workType->name : '-' }}</div>
                        <div class="col-md-6"><strong>Sözleşme:</strong>
                            {{ $employee->contractType ? $employee->contractType->name : '-' }}</div>
                        <div class="col-md-6"><strong>Maaş:</strong> {{ $employee->salary_amount }}</div>
                        <div class="col-md-6"><strong>Banka:</strong> {{ $employee->bank ? $employee->bank->name : '-' }}
                        </div>
                        <div class="col-md-12"><strong>IBAN:</strong> {{ $employee->iban }}</div>

                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <strong>SGK Bilgileri</strong>
                        <a class="text-primary" role="button" data-bs-toggle="modal"
                            data-bs-target="#editSgkModal">Düzenle</a>

                    </div>
                    <div class="card-body row small">
                        <div class="col-md-6"><strong>SGK No:</strong> {{ $employee->sgk_number }}</div>
                        <div class="col-md-6">
                            <strong>Sigorta Türü:</strong>
                            {{ $employee->insuranceType ? $employee->insuranceType->name : '-' }}
                        </div>
                        <div class="col-md-6">
                            <strong>Giriş:</strong>
                            {{ $employee->sgk_start_date ? \Carbon\Carbon::parse($employee->sgk_start_date)->format('d-m-Y') : '-' }}
                        </div>

                        <div class="col-md-6">
                            <strong>Çıkış:</strong>
                            {{ $employee->sgk_end_date ? \Carbon\Carbon::parse($employee->sgk_end_date)->format('d-m-Y') : '-' }}
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <strong>Acil Durum Bilgileri</strong>
                        <a class="text-primary" role="button" data-bs-toggle="modal"
                            data-bs-target="#editEmergencyModal">Düzenle</a>

                    </div>
                    <div class="card-body row small">
                        <div class="col-md-6"><strong>Kişi:</strong> Ayşe Yılmaz</div>
                        <div class="col-md-6"><strong>Telefon:</strong> 0555 999 88 77</div>
                        <div class="col-md-12"><strong>Yakınlık:</strong> Eş</div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="modal fade" id="editWorkModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header bg-light">
                    <h5 class="modal-title">Çalışma & Maaş Bilgileri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form id="workUpdateForm">
                    @csrf
                    <div class="modal-body row g-3">

                        <div class="col-md-6">
                            <label for="work_type_id" class="form-label">Çalışma Türü</label>
                            <select id="work_type_id" name="work_type_id" class="form-select">
                                @foreach ($workTypes as $workType)
                                    <option value="{{ $workType->id }}"
                                        {{ $employee->work_type_id == $workType->id ? 'selected' : '' }}>
                                        {{ $workType->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="contract_type_id" class="form-label">Sözleşme Türü</label>
                            <select id="contract_type_id" name="contract_type_id" class="form-select">
                                @foreach ($contractTypes as $contractType)
                                    <option value="{{ $contractType->id }}"
                                        {{ $employee->contract_type_id == $contractType->id ? 'selected' : '' }}>
                                        {{ $contractType->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="salary_amount" class="form-label">Maaş</label>
                            <input type="text" id="salary_amount" name="salary_amount" class="form-control"
                                value="{{ $employee->salary_amount }}">
                        </div>

                        <div class="col-md-6">
                            <label for="bank_id" class="form-label">Banka</label>
                            <select id="bank_id" name="bank_id" class="form-select">
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank->id }}"
                                        {{ $employee->bank_id == $bank->id ? 'selected' : '' }}>
                                        {{ $bank->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="iban" class="form-label">IBAN</label>
                            <input type="text" id="iban" name="iban" class="form-control"
                                value="{{ $employee->iban }}">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">İptal</button>
                        <button type="button" id="workUpdateSave" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>

            </div>
        </div>
    </div>



    <div class="modal fade" id="tasksModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Görevler</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item">Yeni proje analizi</li>
                        <li class="list-group-item">Maaş hesaplama sistemi</li>
                        <li class="list-group-item">Performans değerlendirme</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="calendarModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Takvim</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center">
                    <i class="bi bi-calendar-event fs-1 text-success"></i>
                    <p class="mt-3">Takvim entegrasyonu burada olacak</p>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="diskModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Disk</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="alert alert-info">
                        Personel belgeleri burada listelenecek.
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="editEmergencyModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Acil Durum Bilgileri</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body row g-3">

                    <div class="col-md-6">
                        <label>Kişi Adı</label>
                        <input class="form-control" value="Ayşe Yılmaz">
                    </div>

                    <div class="col-md-6">
                        <label>Telefon</label>
                        <input class="form-control" value="0555 999 88 77">
                    </div>

                    <div class="col-md-12">
                        <label>Yakınlık</label>
                        <input class="form-control" value="Eş">
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Kaydet</button>
                </div>

            </div>
        </div>
    </div>





    <div class="modal fade" id="editSgkModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form>
                    @csrf
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">SGK Bilgileri</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body row g-3">

                        <div class="col-md-6">
                            <label for="sgk_number" class="form-label">SGK No</label>
                            <input type="text" name="sgk_number" id="sgk_number" class="form-control"
                                value="{{ $employee->sgk_number }}">
                        </div>

                        <div class="col-md-6">
                            <label for="insurance_type_id" class="form-label">Sigorta Türü</label>
                            <select name="insurance_type_id" id="insurance_type_id" class="form-select">
                                <option value="">Seçiniz...</option>
                                @foreach (\App\Models\InsuranceType::all() as $type)
                                    <option value="{{ $type->id }}"
                                        {{ $employee->insurance_type_id == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="sgk_start_date" class="form-label">SGK Giriş Tarihi</label>
                            <input type="date" name="sgk_start_date" id="sgk_start_date" class="form-control"
                                value="{{ $employee->sgk_start_date ? \Carbon\Carbon::parse($employee->sgk_start_date)->format('Y-m-d') : '' }}">
                        </div>

                        <div class="col-md-6">
                            <label for="sgk_end_date" class="form-label">SGK Çıkış Tarihi</label>
                            <input type="date" name="sgk_end_date" id="sgk_end_date" class="form-control"
                                value="{{ $employee->sgk_end_date ? \Carbon\Carbon::parse($employee->sgk_end_date)->format('Y-m-d') : '' }}">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">İptal</button>
                        <button type="button" id="sgkUpdateSave" class="btn btn-primary">Kaydet</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="editContactModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header bg-light">
                    <h5>İletişim Bilgileri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form id="contactUpdateForm">
                    @csrf
                    <div class="modal-body row g-3">

                        <div class="col-md-6">
                            <label for="phone" class="form-label">Telefon</label>
                            <input type="text" id="phone" name="phone" class="form-control"
                                value="{{ $employee->phone }}">
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">E-Posta</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="{{ $employee->email }}">
                        </div>

                        <div class="col-md-12">
                            <label for="address" class="form-label">Adres</label>
                            <input type="text" id="address" name="address" class="form-control"
                                value="{{ $employee->address }}">
                        </div>

                        <div class="col-md-6">
                            <label for="city_id" class="form-label">Şehir</label>
                            <select id="city_id" name="city_id" class="form-select">
                                <option value="">Şehir Seçiniz...</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}"
                                        {{ $employee->city_id == $city->id ? 'selected' : '' }}>
                                        {{ $city->baslik }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="district_id" class="form-label">İlçe</label>
                            <select id="district_id" name="district_id" class="form-select">
                                <option value="">İlçe Seçiniz...</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}"
                                        {{ $employee->district_id == $district->id ? 'selected' : '' }}>
                                        {{ $district->baslik }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="postal_code" class="form-label">Posta Kodu</label>
                            <input type="text" id="postal_code" name="postal_code" class="form-control"
                                value="{{ $employee->postal_code }}">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="editPersonalModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header bg-light">
                    <h5 class="modal-title">Kişisel Bilgiler</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form id="personalUpdateForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="tc_identity_number" class="form-label">TC</label>
                                <input type="text" id="tc_identity_number" class="form-control"
                                    value="{{ $employee->tc_identity_number }}">
                            </div>
                            <div class="col-md-6">
                                <label for="gender" class="form-label">Cinsiyet</label>
                                <select class="form-select" id="gender" name="gender">
                                    <option value="Erkek" {{ $employee->gender == 'Erkek' ? 'selected' : '' }}>Erkek
                                    </option>
                                    <option value="Kadın" {{ $employee->gender == 'Kadın' ? 'selected' : '' }}>Kadın
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="birt_date" class="form-label">Doğum Tarihi</label>
                                <input type="date" id="birt_date" class="form-control"
                                    value="{{ $employee->birth_date }}">
                            </div>
                            <div class="col-md-6">
                                <label for="birth_place" class="form-label">Doğum Yeri</label>
                                <input type="text" id="birth_place" class="form-control"
                                    value="{{ $employee->birth_place }}">
                            </div>
                            <div class="col-md-6">
                                <label for="marital_status" class="form-label">Medeni Durum</label>
                                <select class="form-select" id="marital_status" name="marital_status">
                                    <option value="Evli" {{ $employee->marital_status == 'Evli' ? 'selected' : '' }}>
                                        Evli</option>
                                    <option value="Bekar" {{ $employee->marital_status == 'Bekar' ? 'selected' : '' }}>
                                        Bekar</option>
                                    <option value="Dul" {{ $employee->marital_status == 'Dul' ? 'selected' : '' }}>Dul
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="nationality_id" class="form-label">Uyruk</label>
                                <select class="form-select" id="nationality_id" name="nationality_id">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ $employee->nationality_id == $country->id ? 'selected' : '' }}>
                                            {{ $country->baslik }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">İptal</button>
                        <button type="submit" id="personalUpdateSave" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="editProfilModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">Profil Bilgilerini Güncelle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Profil Fotoğrafı</label>
                                <input type="file" class="form-control" id="avatar" name="avatar">
                                <div class="form-text">JPG, PNG — Maksimum 2MB</div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Ad</label>
                                <input class="form-control" id="name" name="name"
                                    value="{{ $employee->first_name }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Soyad</label>
                                <input class="form-control" id="surname" name="surname"
                                    value="{{ $employee->last_name }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Sicil No</label>
                                <input class="form-control" name="employee_code" id="employee_code"
                                    value="{{ $employee->employee_code }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Pozisyon</label>
                                <select class="form-select" id="position_id" name="position_id">
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->id }}"
                                            {{ $employee->position_id == $position->id ? 'selected' : '' }}>
                                            {{ $position->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Departman</label>
                                <select class="form-select" id="department_id" name="department_id">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}"
                                            {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                                            {{ $department->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Yönetici</label>
                                <select class="form-select" id="manager_id" name="manager_id">
                                    <option value="">Yönetici Seçiniz...</option>
                                    @foreach ($employees as $emp)
                                        <option value="{{ $emp->id }}"
                                            {{ $employee->manager_id == $emp->id ? 'selected' : '' }}>
                                            {{ $emp->first_name }} {{ $emp->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Durum</label>
                                <select class="form-select" id="employment_status_id" name="employment_status_id">
                                    @foreach ($employmentStatues as $employmentStatus)
                                        <option value="{{ $employmentStatus->id }}"
                                            {{ $employee->employment_status_id == $employmentStatus->id ? 'selected' : '' }}>
                                            {{ $employmentStatus->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">İptal</button>
                        <button type="button" id="profileUpdateSave" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // İle Göre İlçeyi Listele
            $('#city_id').on('change', function() {
                let cityId = $(this).val();

                $('#district_id').html('<option>Yükleniyor...</option>');

                if (!cityId) {
                    $('#district_id').html('<option>Önce şehir seçiniz</option>');
                    return;
                }

                $.ajax({
                    url: '/districts/' + cityId,
                    type: 'GET',
                    success: function(data) {
                        let options = '<option value="">İlçe Seçiniz...</option>';

                        $.each(data, function(index, district) {
                            options +=
                                `<option value="${district.id}">${district.baslik}</option>`;
                        });

                        $('#district_id').html(options);
                    }
                });
            });
            // Profil Bilgisini Güncelle
            $('#profileUpdateSave').click(function(e) {
                e.preventDefault();

                let employeeId = "{{ $employee->id }}";
                let avatar = $('#avatar')[0].files[0];
                let name = $('#name').val();
                let surname = $('#surname').val();
                let employee_code = $('#employee_code').val();
                let position_id = $('#position_id').val();
                let department_id = $('#department_id').val();
                let manager_id = $('#manager_id').val();
                let employment_status_id = $('#employment_status_id').val();

                let formData = new FormData();
                formData.append('avatar', avatar);
                formData.append('name', name);
                formData.append('surname', surname);
                formData.append('employee_code', employee_code);
                formData.append('position_id', position_id);
                formData.append('department_id', department_id);
                formData.append('manager_id', manager_id);
                formData.append('employment_status_id', employment_status_id);

                $.ajax({
                    url: '/human-resources/employee-management/profile-update/' + employeeId,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Başarılı!',
                            text: 'Profil başarıyla güncellendi!',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function(xhr) {
                        let errorMsg = 'Profil güncelleme sırasında hata oluştu.';
                        try {
                            let res = JSON.parse(xhr.responseText);
                            if (res.message) errorMsg = res.message;
                        } catch (e) {}

                        Swal.fire({
                            icon: 'error',
                            title: 'Hata!',
                            text: errorMsg,
                            confirmButtonText: 'Tamam'
                        });
                    }

                });
            });
            // Kişisel Bilgileri Güncelle
            $('#personalUpdateSave').click(function(e) {
                e.preventDefault();

                let employeeId = "{{ $employee->id }}";
                let data = {
                    tc_identity_number: $('#tc_identity_number').val(),
                    gender: $('#gender').val(),
                    birt_date: $('#birt_date').val(),
                    birth_place: $('#birth_place').val(),
                    marital_status: $('#marital_status').val(),
                    nationality_id: $('#nationality_id').val(),
                    _token: '{{ csrf_token() }}'
                };


                $.ajax({
                    url: '/human-resources/employee-management/personel-update/' + employeeId,
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Başarılı',
                                text: response.message,
                                confirmButtonText: 'Tamam'
                            }).then(() => {
                                $('#editPersonalModal').modal('hide');
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Hata',
                                text: response.message,
                                confirmButtonText: 'Tamam'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Hata Oluştu',
                            text: xhr.responseJSON ? xhr.responseJSON.message :
                                'Bir hata meydana geldi!',
                            confirmButtonText: 'Tamam'
                        });
                    }

                });
            });
            // İletişim Bilgilerini Güncelle
            $('#contactUpdateForm').submit(function(e) {
                e.preventDefault();

                let employeeId = "{{ $employee->id }}";

                let data = {
                    phone: $('#phone').val(),
                    email: $('#email').val(),
                    address: $('#address').val(),
                    city_id: $('#city_id').val(),
                    district_id: $('#district_id').val(),
                    postal_code: $('#postal_code').val(),
                    _token: '{{ csrf_token() }}'
                };

                $.ajax({
                    url: '/human-resources/employee-management/contact-update/' + employeeId,
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Başarılı',
                                text: response.message,
                                confirmButtonText: 'Tamam'
                            }).then(() => {
                                $('#editContactModal').modal('hide');
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Hata',
                                text: response.message,
                                confirmButtonText: 'Tamam'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Hata Oluştu',
                            text: xhr.responseJSON ? xhr.responseJSON.message :
                                'Bir hata meydana geldi!',
                            confirmButtonText: 'Tamam'
                        });
                    }
                });
            });
            // Çalışma ve Maaş Bilgilerini Güncelle
            $('#workUpdateSave').click(function(e) {
                e.preventDefault();

                let employeeId = "{{ $employee->id }}";

                let data = {
                    work_type_id: $('#work_type_id').val(),
                    contract_type_id: $('#contract_type_id').val(),
                    salary_amount: $('#salary_amount').val(),
                    bank_id: $('#bank_id').val(),
                    iban: $('#iban').val(),
                    _token: '{{ csrf_token() }}'
                };

                $.ajax({
                    url: '/human-resources/employee-management/work-update/' + employeeId,
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Başarılı',
                                text: response.message,
                                confirmButtonText: 'Tamam'
                            }).then(() => {
                                $('#editWorkModal').modal('hide');
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Hata',
                                text: response.message,
                                confirmButtonText: 'Tamam'
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Hata Oluştu',
                            text: xhr.responseJSON ? xhr.responseJSON.message :
                                'Bir hata meydana geldi!',
                            confirmButtonText: 'Tamam'
                        });
                    }
                });
            });
            // SGK Bilgilerini Güncelle
            $('#sgkUpdateSave').click(function(e) {
                e.preventDefault();

                let employeeId = "{{ $employee->id }}";
                let sgk_number = $('#sgk_number').val();
                let insurance_type_id = $('#insurance_type_id').val();
                let sgk_start_date = $('#sgk_start_date').val();
                let sgk_end_date = $('#sgk_end_date').val();

                $.ajax({
                    type: "POST",
                    url: "/human-resources/employee-management/sgk-update/" + employeeId,
                    data: {
                        _token: "{{ csrf_token() }}",
                        sgk_number: sgk_number,
                        insurance_type_id: insurance_type_id,
                        sgk_start_date: sgk_start_date,
                        sgk_end_date: sgk_end_date
                    },
                    success: function(response) {
                        $('#editSgkModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Başarılı!',
                            text: 'SGK bilgileri başarıyla güncellendi.',
                            confirmButtonText: 'Tamam'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Hata!',
                            text: 'SGK bilgileri güncellenirken bir hata oluştu.'
                        });
                    }
                });
            });


        });
    </script>
@endsection
