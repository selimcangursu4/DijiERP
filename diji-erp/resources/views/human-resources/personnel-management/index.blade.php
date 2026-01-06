@extends('partials.master')
@section('main')
    <div class="container-fluid">
        <div class="text-end">
            <a href="{{route('employee-management.create')}}" class="btn btn-primary">Yeni Personel Ekle</a>
            <button class="btn btn-danger">Geri Dön</button>
        </div>
        <div class="card mt-2">
            <div class="card-header bg-light justify-content-between">
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
    { data: 'personel', orderable: false, searchable: false },
    { data: 'employee_code', name: 'employees.employee_code' },

    { data: 'department', orderable: false, searchable: false },
    { data: 'position', orderable: false, searchable: false },
    { data: 'employment_type', orderable: false, searchable: false },

    { data: 'start_date', name: 'employees.sgk_start_date' },
    { data: 'status', orderable: false, searchable: false },
    { data: 'action', orderable: false, searchable: false }
]
    });
});
</script>
@endsection
