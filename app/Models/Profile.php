<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'email', 'contact', 'profile_image','objectives', 'age', 'summary', 'job_experiences', 'birthdate'];

}
