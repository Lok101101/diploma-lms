<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePublication extends Model
{
    use HasFactory;

    protected $table = 'courses_publications';

    protected $fillable = [
        'course_id',
        'lesson_id',
        'test_id'
    ];
}
