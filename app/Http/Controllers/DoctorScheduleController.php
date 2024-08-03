<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    public function store(Request $request)
    {
        // Retrieve form data
        $serviceName = $request->input('service_name');
        $doctorName = $request->input('doctor_name');
        $practiceTime = $request->input('practice_time');

        // Check if at least one day is selected
        $days = $request->input('days');
        if (empty($days)) {
            return redirect()->back()->with('error', 'Silakan pilih setidaknya satu hari.');
        }

        // Validate that start time and end time are set for each selected day
        foreach ($days as $day => $value) {
            $startTime = $request->input($day . '_start_time');
            $endTime = $request->input($day . '_end_time');

            if (empty($startTime) || empty($endTime)) {
                return redirect()->back()->with('error', 'Jam mulai dan jam selesai harus diisi untuk hari yang dipilih.');
            }
        }

        // Create a new Schedule instance and fill in the data
        $schedule = new Schedule();
        $schedule->service_name = $serviceName;
        $schedule->id_doctor = $doctorName;
        $schedule->practice_time = $practiceTime;

        // Set schedule times for selected days
        if (isset($days['monday'])) {
            $schedule->monday_start_time = $request->input('monday_start_time');
            $schedule->monday_end_time = $request->input('monday_end_time');
        }

        if (isset($days['tuesday'])) {
            $schedule->tuesday_start_time = $request->input('tuesday_start_time');
            $schedule->tuesday_end_time = $request->input('tuesday_end_time');
        }

        if (isset($days['wednesday'])) {
            $schedule->wednesday_start_time = $request->input('wednesday_start_time');
            $schedule->wednesday_end_time = $request->input('wednesday_end_time');
        }

        if (isset($days['thursday'])) {
            $schedule->thursday_start_time = $request->input('thursday_start_time');
            $schedule->thursday_end_time = $request->input('thursday_end_time');
        }

        if (isset($days['friday'])) {
            $schedule->friday_start_time = $request->input('friday_start_time');
            $schedule->friday_end_time = $request->input('friday_end_time');
        }

        if (isset($days['saturday'])) {
            $schedule->saturday_start_time = $request->input('saturday_start_time');
            $schedule->saturday_end_time = $request->input('saturday_end_time');
        }

        if (isset($days['sunday'])) {
            $schedule->sunday_start_time = $request->input('sunday_start_time');
            $schedule->sunday_end_time = $request->input('sunday_end_time');
        }

        // Save the schedule to the database
        $schedule->save();

        return redirect()->back()->with('success', 'Jadwal dokter berhasil ditambahkan.');
    }
    public function update(Request $request)
    {
        $scheduleId = $request->input('id_schedule');
        $serviceName = $request->input('service_name');
        $doctorName = $request->input('doctor_name');
        $practiceTime = $request->input('practice_time');

        // Find the existing schedule
        $schedule = Schedule::find($scheduleId);

        if (!$schedule) {
            return redirect()->back()->with('error', 'Jadwal dokter tidak ditemukan.');
        }

        // Check if at least one day is selected
        $days = $request->input('days');
        if (empty($days)) {
            return redirect()->back()->with('error', 'Silakan pilih setidaknya satu hari.');
        }

        // Validate that start time and end time are set for each selected day
        foreach ($days as $day => $value) {
            $startTime = $request->input($day . '_start_time');
            $endTime = $request->input($day . '_end_time');

            if (empty($startTime) || empty($endTime)) {
                return redirect()->back()->with('error', 'Jam mulai dan jam selesai harus diisi untuk hari yang dipilih.');
            }
        }

        // Update the schedule instance with new data
        $schedule->service_name = $serviceName;
        $schedule->id_doctor = $doctorName;
        $schedule->practice_time = $practiceTime;

        // Set schedule times for selected days
        if (isset($days['monday'])) {
            $schedule->monday_start_time = $request->input('monday_start_time');
            $schedule->monday_end_time = $request->input('monday_end_time');
        } else {
            $schedule->monday_start_time = null;
            $schedule->monday_end_time = null;
        }

        if (isset($days['tuesday'])) {
            $schedule->tuesday_start_time = $request->input('tuesday_start_time');
            $schedule->tuesday_end_time = $request->input('tuesday_end_time');
        } else {
            $schedule->tuesday_start_time = null;
            $schedule->tuesday_end_time = null;
        }

        if (isset($days['wednesday'])) {
            $schedule->wednesday_start_time = $request->input('wednesday_start_time');
            $schedule->wednesday_end_time = $request->input('wednesday_end_time');
        } else {
            $schedule->wednesday_start_time = null;
            $schedule->wednesday_end_time = null;
        }

        if (isset($days['thursday'])) {
            $schedule->thursday_start_time = $request->input('thursday_start_time');
            $schedule->thursday_end_time = $request->input('thursday_end_time');
        } else {
            $schedule->thursday_start_time = null;
            $schedule->thursday_end_time = null;
        }

        if (isset($days['friday'])) {
            $schedule->friday_start_time = $request->input('friday_start_time');
            $schedule->friday_end_time = $request->input('friday_end_time');
        } else {
            $schedule->friday_start_time = null;
            $schedule->friday_end_time = null;
        }

        if (isset($days['saturday'])) {
            $schedule->saturday_start_time = $request->input('saturday_start_time');
            $schedule->saturday_end_time = $request->input('saturday_end_time');
        } else {
            $schedule->saturday_start_time = null;
            $schedule->saturday_end_time = null;
        }

        if (isset($days['sunday'])) {
            $schedule->sunday_start_time = $request->input('sunday_start_time');
            $schedule->sunday_end_time = $request->input('sunday_end_time');
        } else {
            $schedule->sunday_start_time = null;
            $schedule->sunday_end_time = null;
        }

        // Save the updated schedule to the database
        $schedule->save();

        return redirect()->back()->with('success', 'Jadwal dokter berhasil diperbarui.');
    }
}
