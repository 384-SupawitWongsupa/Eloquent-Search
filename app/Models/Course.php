<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'teacher_id',
    ];

    // ความสัมพันธ์กับ Teacher
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    // ความสัมพันธ์กับ Register
    public function registers()
    {
        return $this->hasMany(Register::class);
    }
}