<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'email',
        'contact',
        'objectives',
        'birthdate',
        'age',
        'summary',
        'profile_image',
        'job_experiences',
    ];

    protected $casts = [
        'birthdate' => 'date',
        'job_experiences' => 'array',
    ];
}