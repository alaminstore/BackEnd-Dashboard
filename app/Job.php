<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'location',
        'short_description',
        'description',
        'deadline',
    ];
    protected $dates = [
        'deadline',
    ];

    public function requirements() {
        return $this->belongsToMany(Requirement::class, 'job_requirements');
    }

    public function responsibilities() {
        return $this->belongsToMany(Responsibility::class, 'job_responsibilities');
    }
    public function applicants() {
        return $this->belongsToMany(Applicant::class, 'job_applicants');
    }
}
