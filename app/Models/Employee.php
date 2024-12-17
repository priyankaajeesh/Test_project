<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'dob',
        'department',
    ];

    // Correct placement of the leaves() method
    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }
    public function attendances()
{
    return $this->hasMany(Attendance::class);
}
}
