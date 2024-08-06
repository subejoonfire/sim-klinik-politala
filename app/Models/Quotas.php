<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotas extends Model
{
    use HasFactory;
    protected $table = 'quotas';
    protected $primaryKey = 'id_quota';

    // Menentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'id_doctor',
        'day',
        'service',
        'practice_time',
        'type',
        'quota',
    ];
    public $timestamps = false;
}
