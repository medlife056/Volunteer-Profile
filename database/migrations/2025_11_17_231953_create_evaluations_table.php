<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('volunteer_id')->constrained('volunteers')->onDelete('cascade');
            $table->foreignId('supervisor_id')->constrained('volunteers')->onDelete('cascade');

            $table->date('evaluation_date')->nullable();
            $table->string('team_name')->nullable();

            $table->integer('initial_score')->nullable();
            $table->integer('monthly_score')->nullable();
            $table->integer('posts_score')->nullable();
            $table->integer('activity_score')->nullable();

            $table->text('supervisor_opinion')->nullable();
            $table->integer('new_ideas_score')->nullable();
            $table->integer('creativity_score')->nullable();
            $table->integer('commitment_score')->nullable();
            $table->integer('meetings_attendance')->nullable();
            $table->integer('networking_participation')->nullable();

            $table->text('negatives_notes')->nullable();
            $table->text('ideas_presented')->nullable();

            $table->integer('final_score')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
