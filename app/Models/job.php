<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

  protected $fillable = [
        'title',
        'salary',
        'employer_id',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
    return $this->belongsToMany(\App\Models\Tag::class, 'job_listing_tag', 'job_id', 'tag_id');
    }

}

