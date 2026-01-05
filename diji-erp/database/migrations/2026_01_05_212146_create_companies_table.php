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
        Schema::create('companies', function (Blueprint $table) {
    $table->id();

    $table->string('company_code')->unique();
    $table->string('name');
    $table->string('legal_name')->nullable();
    $table->string('tax_number')->nullable();
    $table->string('tax_office')->nullable();

    $table->string('email')->nullable();
    $table->string('phone')->nullable();
    $table->string('website')->nullable();

    $table->string('address')->nullable();
    $table->integer('city_id')->nullable();
    $table->integer('district_id')->nullable();

    $table->boolean('is_active')->default(true);

    $table->timestamps();
    $table->softDeletes();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
