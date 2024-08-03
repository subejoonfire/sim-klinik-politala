<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;

    protected $table = 'doctors';

    protected $fillable = [
        'doctor_username',
    ];
    protected $primaryKey = 'id_doctor';
}
