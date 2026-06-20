<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolProfile extends Model
{
    protected $fillable = [
        'school_name',
        'active_school_year',
        'established_year',
        'teacher_count',
        'staff_count',
        'student_count',
        'establishment_decree_number',
        'establishment_decree_file',
        'profile_photo',
        'accreditation',
        'notes',
    ];
}
