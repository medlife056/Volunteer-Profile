<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('volunteertasks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('VoulnteerID')->constrained('volunteers')->onDelete('cascade');

            $table->foreignId('cell_ID')->nullable()->constrained('cells')->nullOnDelete();

            $table->foreignId('idJobTitel')->nullable()->constrained('jobtitle')->nullOnDelete();

            $table->foreignId('idActiveStatus')->nullable()->constrained('activestatus')->nullOnDelete();

            $table->text('Reason')->nullable();
            $table->date('startDate')->nullable();
            $table->date('EndDate')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteertasks');
    }
};
