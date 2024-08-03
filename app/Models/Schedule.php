<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';
    protected $fillable = [
        'service_name',
        'doctor_name',
        'practice_time',
        'monday_time',
        'tuesday_time',
        'wednesday_time',
        'thursday_time',
        'friday_time',
        'saturday_time',
        'sunday_time'
    ];
    protected $primaryKey = 'id_schedule';

    public $timestamps = false;

    public static function getScheduleWithDoctor()
    {
        return self::join('doctors', 'schedules.id_doctor', '=', 'doctors.id_doctor')
            ->select('schedules.*', 'doctors.*')
            ->get();
    }
}
