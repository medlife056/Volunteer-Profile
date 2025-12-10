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
        Schema::create('supervisor_ratings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('volunteer_id')->constrained('volunteers')->onDelete('cascade');
            $table->foreignId('supervisor_id')->constrained('volunteers')->onDelete('cascade');

            $table->integer('activity_score')->nullable();
            $table->integer('behavior_score')->nullable();
            $table->integer('motivation_score')->nullable();
            $table->integer('scientific_skill_score')->nullable();

            $table->text('pros_cons')->nullable();
            $table->integer('fairness_score')->nullable();
            $table->integer('team_quality_score')->nullable();
            $table->integer('tasks_distribution_fairness')->nullable();
            $table->integer('general_supervisor_time')->nullable();
            $table->string('management_behavior')->nullable();
            $table->string('space_given')->nullable();
            $table->string('listening_and_suggestions')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supervisor_ratings');
    }
};
