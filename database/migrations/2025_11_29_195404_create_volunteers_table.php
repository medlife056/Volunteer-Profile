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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 255);
            $table->string('phone', 255);
            $table->string('national_id', 255);
            $table->date('dob');
            $table->string('governorate', 255);
            $table->text('address');
            $table->string('qualification', 255);
            $table->string('university', 255);
            $table->string('academic_year', 255);
            $table->date('date_of_joining');
            $table->string('working_hours', 255);
            $table->string('specialization', 255);
            $table->string('hospital', 255);
            $table->string('academic_status', 255);
            $table->integer('rating')->default(0);
            $table->text('notes')->nullable();
            $table->string('photo_path')->nullable();
            $table->tinyInteger('agreed_to_policy')->default(0);
            $table->string('password')->default(11);
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};
