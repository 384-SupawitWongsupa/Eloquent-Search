<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
    ];

    // ความสัมพันธ์กับ Register
    public function registers()
    {
        return $this->hasMany(Register::class);
    }
}