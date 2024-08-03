<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientReservation extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'reservations';

    // Tentukan atribut yang dapat diisi secara massal
    protected $fillable = [
        'id_patient',
        'reservation_number',
        'reservation_date',
        'reservation_time',
        'service',
        'doctor',
        'practice_time',
        'mr',
        'patient_name',
        'phone',
        'room',
        'status',
        'type',
        'notes',
    ];
    protected $primaryKey = 'id_reservation';
    // Nonaktifkan timestamps jika tidak digunakan
    public $timestamps = false;

    public static function getReservationsWithPatient()
    {
        return self::join('patients', 'reservations.id_patient', '=', 'patients.id_patient')
            ->join('doctors', 'doctors.id_doctor', '=', 'reservations.id_doctor')
            ->select('reservations.*', 'patients.*', 'doctors.*')
            ->orderBy('id_reservation', 'desc')
            ->select('reservations.*', 'patients.*', 'doctors.*')
            ->get();
    }
}
