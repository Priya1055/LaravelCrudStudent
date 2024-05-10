<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudInfo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'class', 'roll_no', 'grade', 'email', 'gender','subject','country'];
}
