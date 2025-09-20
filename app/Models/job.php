<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Tell Laravel to use our job_listings table
    protected $table = 'job_listings';

    // Allow mass assignment
    protected $fillable = ['title', 'salary', 'employer_id'];

    // Each job belongs to an employer
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
