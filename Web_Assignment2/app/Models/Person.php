<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $fillable = ['fullName', 'username', 'birthDate', 'phone',
                            'address','password','confirmPassword','image','email'];
}
