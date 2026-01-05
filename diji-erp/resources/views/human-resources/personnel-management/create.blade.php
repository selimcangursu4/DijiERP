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
                        <label class="form-label">Sicil No</label>
                        <input type="text" class="form-control" placeholder="EMP-0001">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Ad</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Soyad</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">TC Kimlik No</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Cinsiyet</label>
                        <select class="form-select">
                            <option>Erkek</option>
                            <option>Kadın</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Doğum Tarihi</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Doğum Yeri</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Medeni Durum</label>
                        <select class="form-select">
                            <option>Bekar</option>
                            <option>Evli</option>
                            <option>Boşanmış</option>
                            <option>Bilinmiyor</option>
                        </select>
                    </div>
                    <div class="col-12 mt-4">
                        <h6 class="text-muted">İş Bilgileri</h6>
                        <hr>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Departman</label>
                        <select class="form-select">
                            <option>Yazılım</option>
                            <option>İnsan Kaynakları</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Pozisyon</label>
                        <select class="form-select">
                            <option>Backend Developer</option>
                            <option>Frontend Developer</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Çalışma Türü</label>
                        <select class="form-select">
                            <option>Tam Zamanlı</option>
                            <option>Yarı Zamanlı</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Çalışma Şekli</label>
                        <select class="form-select">
                            <option>Ofis</option>
                            <option>Uzaktan</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Sözleşme Türü</label>
                        <select class="form-select">
                            <option>Süresiz</option>
                            <option>Belirli Süreli</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Maaş</label>
                        <input type="number" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Para Birimi</label>
                        <select class="form-select">
                            <option>TRY</option>
                            <option>USD</option>
                            <option>EUR</option>
                        </select>
                    </div>
                    <div class="col-12 mt-4">
                        <h6 class="text-muted">İletişim Bilgileri</h6>
                        <hr>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Telefon</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Alternatif Telefon</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">E-posta</label>
                        <input type="email" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Adres</label>
                        <textarea class="form-control" rows="2"></textarea>
                    </div>
                    <div class="col-12 mt-4">
                        <h6 class="text-muted">Acil Durum Kişisi</h6>
                        <hr>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Ad Soyad</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Telefon</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Yakınlık</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-12 text-end mt-4">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
