<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // One employer has many jobs
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
