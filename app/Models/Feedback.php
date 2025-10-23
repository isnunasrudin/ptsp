<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'requirements_rating',
        'procedure_rating',
        'timeliness_rating',
        'cost_rating',
        'product_quality_rating',
        'staff_competence_rating',
        'staff_politeness_rating',
        'handling_complaint_rating',
        'facility_rating',
        'overall_satisfaction',
        'message',
    ];
}
