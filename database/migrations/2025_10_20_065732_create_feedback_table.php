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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('requirements_rating');
            $table->unsignedInteger('procedure_rating');
            $table->unsignedInteger('timeliness_rating');
            $table->unsignedInteger('cost_rating');
            $table->unsignedInteger('product_quality_rating');
            $table->unsignedInteger('staff_competence_rating');
            $table->unsignedInteger('staff_politeness_rating');
            $table->unsignedInteger('handling_complaint_rating');
            $table->unsignedInteger('facility_rating');
            $table->unsignedInteger('overall_satisfaction');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
