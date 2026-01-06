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
                        <div class="col-md-6"><strong>Telefon:</strong> 0555 444 33 22</div>
                        <div class="col-md-6"><strong>E-Posta:</strong> a.yilmaz@firma.com</div>
                        <div class="col-md-12"><strong>Adres:</strong> Kadıköy / İstanbul</div>
                        <div class="col-md-6"><strong>Şehir:</strong> İstanbul</div>
                        <div class="col-md-6"><strong>İlçe:</strong> Kadıköy</div>
                        <div class="col-md-6"><strong>Posta Kodu:</strong> 34700</div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <strong>Çalışma & Maaş</strong>
                        <a class="text-primary" role="button" data-bs-toggle="modal"
                            data-bs-target="#editWorkModal">Düzenle</a>

                    </div>
                    <div class="card-body row small">
                        <div class="col-md-6"><strong>Çalışma Türü:</strong> Tam Zamanlı</div>
                        <div class="col-md-6"><strong>Sözleşme:</strong> Süresiz</div>
                        <div class="col-md-6"><strong>Maaş:</strong> 35.000 TL</div>
                        <div class="col-md-6"><strong>Banka:</strong> Ziraat</div>
                        <div class="col-md-12"><strong>IBAN:</strong> TR12 0001 0002 0003 0004</div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <strong>SGK Bilgileri</strong>
                        <a class="text-primary" role="button" data-bs-toggle="modal"
                            data-bs-target="#editSgkModal">Düzenle</a>

                    </div>
                    <div class="card-body row small">
                        <div class="col-md-6"><strong>SGK No:</strong> 458796321</div>
                        <div class="col-md-6"><strong>Sigorta Türü:</strong> 4A</div>
                        <div class="col-md-6"><strong>Giriş:</strong> 2021-03-10</div>
                        <div class="col-md-6"><strong>Çıkış:</strong> —</div>
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

    <div class="modal fade" id="editPersonalModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header bg-light">
                    <h5 class="modal-title">Kişisel Bilgiler</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body row g-3">
                    <div class="col-md-6">
                        <label>TC</label>
                        <input type="text" class="form-control" value="12345678901" readonly>
                    </div>
                    <div class="col-md-6">
                        <label>Cinsiyet</label>
                        <select class="form-select">
                            <option selected>Erkek</option>
                            <option>Kadın</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Doğum Tarihi</label>
                        <input type="date" class="form-control" value="1992-05-12">
                    </div>
                    <div class="col-md-6">
                        <label>Doğum Yeri</label>
                        <input type="text" class="form-control" value="İstanbul">
                    </div>
                    <div class="col-md-6">
                        <label>Medeni Durum</label>
                        <select class="form-select">
                            <option selected>Evli</option>
                            <option>Bekar</option>
                            <option>Dul</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Uyruk</label>
                        <input type="text" class="form-control" value="Türkiye">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Kaydet</button>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="editContactModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>İletişim Bilgileri</h5><button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body row g-3">
                    <div class="col-md-6"><label>Telefon</label><input class="form-control" value="0555 444 33 22"></div>
                    <div class="col-md-6"><label>E-Posta</label><input class="form-control" value="a.yilmaz@firma.com">
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-primary">Kaydet</button></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editWorkModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Çalışma & Maaş Bilgileri</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body row g-3">

                    <div class="col-md-6">
                        <label>Çalışma Türü</label>
                        <select class="form-select">
                            <option>Tam Zamanlı</option>
                            <option>Yarı Zamanlı</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label>Sözleşme Türü</label>
                        <select class="form-select">
                            <option>Süresiz</option>
                            <option>Süreli</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label>Maaş</label>
                        <input class="form-control" value="35000">
                    </div>

                    <div class="col-md-6">
                        <label>Banka</label>
                        <input class="form-control" value="Ziraat">
                    </div>

                    <div class="col-md-12">
                        <label>IBAN</label>
                        <input class="form-control" value="TR12 0001 0002 0003 0004">
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

                <div class="modal-header">
                    <h5 class="modal-title">SGK Bilgileri</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body row g-3">

                    <div class="col-md-6">
                        <label>SGK No</label>
                        <input class="form-control" value="458796321">
                    </div>

                    <div class="col-md-6">
                        <label>Sigorta Türü</label>
                        <select class="form-select">
                            <option>4A</option>
                            <option>4B</option>
                            <option>4C</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label>SGK Giriş Tarihi</label>
                        <input type="date" class="form-control" value="2021-03-10">
                    </div>

                    <div class="col-md-6">
                        <label>SGK Çıkış Tarihi</label>
                        <input type="date" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Kaydet</button>
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

        });
    </script>
@endsection
