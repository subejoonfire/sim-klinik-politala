<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $table = 'patients';

    protected $fillable = [
        'mr',
        'tgl_lahir',
        'nama',
        'alamat',
        'telp',
        'nama_ibu',
        'nama_ayah',
        'nik',
        'no_bpjs',
        'agama',
    ];
    protected $primaryKey = 'id_patient';

}
