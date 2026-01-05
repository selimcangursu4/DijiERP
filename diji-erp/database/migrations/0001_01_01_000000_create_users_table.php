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
        Schema::create('users', function (Blueprint $table) {
           $table->id(); // Kullanıcı / Personel benzersiz ID
           $table->integer('company_id'); // Bağlı olduğu firma ID
           $table->string('employee_id'); // Personel Id
           $table->string('email')->unique(); // E-posta adresi
           $table->timestamp('email_verified_at')->nullable(); // E-posta doğrulama tarihi
           $table->string('password'); // Kullanıcı şifresi
           $table->rememberToken(); // Oturum hatırlama tokeni
           $table->timestamps(); // created_at / updated_at
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
