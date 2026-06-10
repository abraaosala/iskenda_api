<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('company_info', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('full_name');
            $table->string('slogan');
            $table->unsignedSmallInteger('founded_year');
            $table->unsignedSmallInteger('years_experience');
            $table->unsignedSmallInteger('active_clients_count');
            $table->string('phone');
            $table->string('email');
            $table->string('working_hours');
            $table->string('address');
            $table->string('copyright');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_info');
    }
};
