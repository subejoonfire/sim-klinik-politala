<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queues extends Model
{
    use HasFactory;
    protected $table = 'queues';

    // Specify the primary key
    protected $primaryKey = 'id_queue';

    // Specify the fillable attributes
    protected $fillable = [
        'nama_calon_pasien',
        'tanggal',
        'jam',
        'bpjs_no_bpjs',
        'antrian',
        'panggil',
        'durasi',
        'status'
    ];

    // Disable timestamps if not using them
    public $timestamps = false;
}
