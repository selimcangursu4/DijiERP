@extends('partials.master')

@section('main')
    <div class="container-fluid">
        <div class="text-end">
            <button class="btn btn-danger">Geri Dön</button>
        </div>
        <div class="card mt-2">
            <div class="card-header">
                <h5 class="card-title">Yeni Personel Ekleme Formu</h5>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    <div class="row g-3">
                        <div class="col-12">
                            <h6 class="text-muted">Personel Bilgileri</h6>
                            <hr>
                        </div>
                        <div class="col-md-3">
                            <label for="first_name" class="form-label">Ad</label>
                            <input type="text" id="first_name" name="first_name" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="last_name" class="form-label">Soyad</label>
                            <input type="text" id="last_name" name="last_name" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="tc_identity_number" class="form-label">TC Kimlik No</label>
                            <input type="text" id="tc_identity_number" name="tc_identity_number" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="gender" class="form-label">Cinsiyet</label>
                            <select id="gender" name="gender" class="form-select">
                                <option value="Erkek">Erkek</option>
                                <option value="Kadın">Kadın</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="birth_date" class="form-label">Doğum Tarihi</label>
                            <input type="date" id="birth_date" name="birth_date" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="birth_place" class="form-label">Doğum Yeri</label>
                            <input type="text" id="birth_place" name="birth_place" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="marital_status" class="form-label">Medeni Durum</label>
                            <select id="marital_status" name="marital_status" class="form-select">
                                <option value="Bekar">Bekar</option>
                                <option value="Evli">Evli</option>
                                <option value="Boşanmış">Boşanmış</option>
                                <option value="Bilinmiyor">Bilinmiyor</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="nationality" class="form-label">Uyruk</label>
                            <select id="nationality" name="nationality" class="form-select">
                                <option value="">Uyruk Seçiniz...</option>
                                <option value="1">Türkiye</option>
                            </select>
                        </div>
                        <div class="col-12 mt-4">
                            <h6 class="text-muted">İletişim Bilgileri</h6>
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <label for="phone" class="form-label">Telefon</label>
                            <input type="text" id="phone" name="phone" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="phone_secondary" class="form-label">Alternatif Telefon</label>
                            <input type="text" id="phone_secondary" name="phone_secondary" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="form-label">E-posta</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="city_id" class="form-label">Şehir Bilgisi</label>
                            <select id="city_id" name="city_id" class="form-select">
                                <option value="">Şehir Seçiniz...</option>
                                <option value="1">İstanbul</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="district_id" class="form-label">İlçe Bilgisi</label>
                            <select id="district_id" name="district_id" class="form-select">
                                <option value="">İlçe Seçiniz...</option>
                                <option value="1">Ümraniye</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="postal_code" class="form-label">Posta Kodu</label>
                            <input type="text" id="postal_code" name="postal_code" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="address" class="form-label">Adres</label>
                            <textarea id="address" name="address" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="col-12 mt-4">
                            <h6 class="text-muted">Eğitim Bilgileri</h6>
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <label for="education_level_id" class="form-label">Mezuniyet Tipi</label>
                            <select id="education_level_id" name="education_level_id" class="form-select">
                                <option value="">Mezuniyet Tipi Seçiniz...</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="last_school_id" class="form-label">Mezun Olduğu En Son Okul</label>
                            <select id="last_school_id" name="last_school_id" class="form-select">
                                <option value="">Okul Seçiniz...</option>
                                <option value="1">Marmara Üniversitesi</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="graduation_date" class="form-label">Mezuniyet Tarihi</label>
                            <input type="date" id="graduation_date" name="graduation_date" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="profession_id" class="form-label">Meslek Bilgisi</label>
                            <select id="profession_id" name="profession_id" class="form-select">
                                <option value="">Meslek Seçiniz...</option>
                                <option value="1">Yazılım Mühendisi</option>
                            </select>
                        </div>
                        <div class="col-12 mt-4">
                            <h6 class="text-muted">İş Bilgileri</h6>
                            <hr>
                        </div>

                        <div class="col-md-3">
                            <label for="department_id" class="form-label">Departman</label>
                            <select id="department_id" name="department_id" class="form-select">
                                <option value="">Departman Seçiniz...</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="position_id" class="form-label">Pozisyon</label>
                            <select id="position_id" name="position_id" class="form-select">
                                <option value="">Pozisyon Seçiniz...</option>
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="employment_type_id" class="form-label">Çalışma Türü</label>
                            <select id="employment_type_id" name="employment_type_id" class="form-select">
                                <option value="">Çalışma Türü Seçiniz...</option>
                                @foreach ($employmentTypes as $employmentType)
                                    <option value="{{ $employmentType->id }}">{{ $employmentType->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="work_type_id" class="form-label">Çalışma Şekli</label>
                            <select id="work_type_id" name="work_type_id" class="form-select">
                                <option value="">Çalışma Şekli Seçiniz...</option>
                                @foreach ($workTypes as $workType)
                                    <option value="{{ $workType->id }}">{{ $workType->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="contract_type_id" class="form-label">Sözleşme Türü</label>
                            <select id="contract_type_id" name="contract_type_id" class="form-select">
                                <option value="">Sözleşme Türü Seçiniz...</option>
                                @foreach ($contractTypes as $contractType)
                                    <option value="{{ $contractType->id }}">{{ $contractType->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="salary" class="form-label">Maaş</label>
                            <input type="number" id="salary" name="salary" class="form-control" step="0.01"
                                min="0">
                        </div>

                        <div class="col-md-3">
                            <label for="salary_currency" class="form-label">Para Birimi</label>
                            <select id="salary_currency" name="salary_currency" class="form-select">
                                <option value="TRY">TRY</option>
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="bank_id" class="form-label">Banka Bilgisi</label>
                            <select id="bank_id" name="bank_id" class="form-select">
                                <option value="">Banka Seçiniz...</option>
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="iban" class="form-label">IBAN Bilgisi</label>
                            <input type="text" id="iban" name="iban" class="form-control">
                        </div>

                        <div class="col-12 mt-4">
                            <h6 class="text-muted">SGK Bilgileri</h6>
                            <hr>
                        </div>

                        <div class="col-md-4">
                            <label for="sgk_registration_number" class="form-label">SGK Sicil Numarası</label>
                            <input type="text" id="sgk_registration_number" name="sgk_registration_number"
                                class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label for="sgk_entry_date" class="form-label">SGK Giriş Tarihi</label>
                            <input type="date" id="sgk_entry_date" name="sgk_entry_date" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label for="sgk_exit_date" class="form-label">SGK Çıkış Tarihi</label>
                            <input type="date" id="sgk_exit_date" name="sgk_exit_date" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label for="insurance_type_id" class="form-label">SGK Tipi</label>
                            <select id="insurance_type_id" name="insurance_type_id" class="form-select">
                                <option value="">SGK Tipi Seçiniz...</option>
                                @foreach ($insuranceTypes as $insuranceType)
                                    <option value="{{ $insuranceType->id }}">{{ $insuranceType->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-12 mt-4">
                            <h6 class="text-muted">Acil Durum Kişisi</h6>
                            <hr>
                        </div>

                        <div class="col-md-4">
                            <label for="emergency_contact_name" class="form-label">Ad Soyad</label>
                            <input type="text" id="emergency_contact_name" name="emergency_contact_name"
                                class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label for="emergency_contact_phone" class="form-label">Telefon</label>
                            <input type="text" id="emergency_contact_phone" name="emergency_contact_phone"
                                class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label for="emergency_contact_relation" class="form-label">Yakınlık</label>
                            <input type="text" id="emergency_contact_relation" name="emergency_contact_relation"
                                class="form-control">
                        </div>

                        <div class="col-12 text-end mt-4">
                            <button type="submit" class="btn btn-primary" id="employee_form_submit">
                                Kaydet
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
