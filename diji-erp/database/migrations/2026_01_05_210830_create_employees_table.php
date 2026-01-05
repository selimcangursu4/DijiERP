<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('employees', function (Blueprint $table) {
       $table->id(); // Personel ID
       $table->integer('company_id'); // Firma ID

       $table->string('employee_code')->unique(); // Personel sicil no

       $table->string('first_name'); // Ad
       $table->string('last_name'); // Soyad
       $table->string('tc_identity_number')->unique(); // TC Kimlik
       $table->string('gender'); // Cinsiyet
       $table->date('birth_date'); // Doğum tarihi
       $table->string('birth_place'); // Doğum yeri
       $table->enum('marital_status', ['Bekar', 'Evli','Boşanmış','Bilinmiyor']); // Medeni durum
       $table->integer('nationality_id'); // Uyruk

       $table->integer('department_id'); // Departman
       $table->integer('position_id'); // Pozisyon
       $table->integer('manager_id')->nullable(); // Üst yönetici
       $table->integer('employment_type_id'); // Çalışma türü
       $table->integer('work_type_id'); // Çalışma şekli
       $table->integer('employment_status_id'); // Aktif / ayrıldı
       $table->integer('contract_type_id'); // Sözleşme türü

       $table->decimal('salary_amount', 10, 2); // Maaş
       $table->string('currency', 10); // Para birimi
       $table->integer('bank_id'); // Banka
       $table->string('iban'); // IBAN

       $table->string('sgk_number'); // SGK sicil no
       $table->date('sgk_start_date'); // SGK giriş
       $table->date('sgk_end_date')->nullable(); // SGK çıkış
       $table->integer('insurance_type_id'); // 4A / 4B / 4C

       $table->integer('education_level_id'); // Eğitim seviyesi
       $table->string('school_name'); // Okul adı
       $table->year('graduation_year'); // Mezuniyet yılı
       $table->integer('profession_id'); // Meslek
       $table->json('certificates')->nullable(); // Sertifikalar

       $table->string('phone')->unique(); // Telefon
       $table->string('alternative_phone')->nullable(); // Alternatif telefon
       $table->string('email')->nullable(); // Kurumsal e-posta

       $table->string('address'); // Adres
       $table->integer('city_id'); // İl
       $table->integer('district_id'); // İlçe
       $table->string('postal_code'); // Posta kodu

       $table->string('emergency_contact_name'); // Acil kişi
       $table->string('emergency_contact_phone'); // Acil telefon
       $table->string('emergency_contact_relation'); // Yakınlık

       $table->timestamps(); // created_at / updated_at
       $table->softDeletes(); // deleted_at
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
