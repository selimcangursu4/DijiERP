@extends('partials.master')
@section('main')
    <div class="container-fluid">
        <div class="text-end">
            <button class="btn btn-primary">Yeni Personel Ekle</button>
            <button class="btn btn-danger">Geri Dön</button>
        </div>
        <div class="card mt-2">
            <div class="card-header justify-content-between">
                <h4 class="card-title">Personel Listesi</h4>
            </div>
            <div class="card-body">
                <table id="datatables-ajax" class="table table-striped dt-responsive align-middle mb-0">
                    <thead class="thead-sm text-uppercase fs-xxs">
                        <tr>
                            <th>Personel</th>
                            <th>Sicil No</th>
                            <th>Departman</th>
                            <th>Pozisyon</th>
                            <th>Çalışma Türü</th>
                            <th>İşe Giriş</th>
                            <th>Durum</th>
                            <th class="text-end">İşlem</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <script>
$(function () {
    $('#datatables-ajax').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('employee-management.fetch') }}",
        columns: [
            { data: 'personel', name: 'personel', orderable: false, searchable: false },
            { data: 'employee_code', name: 'employee_code' },
            { data: 'department', name: 'department.name' },
            { data: 'position', name: 'position.name' },
            { data: 'employment_type', name: 'employmentType.name' },
            { data: 'start_date', name: 'start_date' },
            { data: 'status', name: 'status', orderable: false, searchable: false },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.7/i18n/tr.json"
        }
    });
});
</script>
@endsection
