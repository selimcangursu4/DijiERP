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
       Schema::create('positions', function (Blueprint $table) {
    $table->id();
    $table->integer('company_id');

    $table->string('code')->nullable();
    $table->string('name');
    $table->text('description')->nullable();

    $table->integer('department_id')->nullable();
    $table->integer('level')->nullable(); // Junior / Mid / Senior vs

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
        Schema::dropIfExists('positions');
    }
};
