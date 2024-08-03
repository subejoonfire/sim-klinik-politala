<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Patients;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PatientReservation;

class ReservationController extends Controller
{
    // Method untuk menyimpan reservasi baru
    public function store(Request $request)
    {
        // Pengecekan manual
        if (empty($request->id_patient)) {
            return redirect()->back()->with('error', 'ID pasien harus diisi.');
        }

        if (!Patients::find($request->id_patient)) {
            return redirect()->back()->with('error', 'ID pasien tidak ditemukan.');
        }

        if (empty($request->reservation_date)) {
            return redirect()->back()->with('error', 'Tanggal reservasi harus diisi.');
        }

        if (!strtotime($request->reservation_date)) {
            return redirect()->back()->with('error', 'Format tanggal reservasi tidak valid.');
        }

        if (empty($request->reservation_time)) {
            return redirect()->back()->with('error', 'Jam reservasi harus diisi.');
        }

        if (empty($request->service)) {
            return redirect()->back()->with('error', 'Layanan harus dipilih.');
        }

        if (empty($request->doctor)) {
            return redirect()->back()->with('error', 'Dokter harus dipilih.');
        }

        if (empty($request->practice_time)) {
            return redirect()->back()->with('error', 'Waktu praktek harus dipilih.');
        }

        if (!in_array($request->practice_time, ['PAGI', 'SIANG'])) {
            return redirect()->back()->with('error', 'Waktu praktek tidak valid.');
        }

        if (empty($request->room)) {
            return redirect()->back()->with('error', 'Ruangan harus diisi.');
        }

        if (empty($request->type)) {
            return redirect()->back()->with('error', 'Tipe harus diisi.');
        }

        // Mendapatkan data pasien berdasarkan id_patient

        // Membuat nomor reservasi secara otomatis
        $reservation_number = 'RES-' . strtoupper(Str::random(8));

        // Membuat reservasi baru
        $reservation = new PatientReservation();
        $reservation->id_doctor = $request->doctor;
        $reservation->id_patient = $request->id_patient;
        $reservation->reservation_number = $reservation_number;
        $reservation->reservation_date = $request->reservation_date;
        $reservation->reservation_time = $request->reservation_time;
        $reservation->service = $request->service;
        $reservation->practice_time = $request->practice_time;
        $reservation->room = $request->room;
        $reservation->status = "MENUNGGU";
        $reservation->type = $request->type;
        $reservation->notes = $request->notes;
        $reservation->save();
        return redirect()->back()->with('success', 'Reservasi berhasil ditambahkan.');
    }

    // Method untuk memperbarui reservasi
    public function update(Request $request)
    {
        // Pengecekan manual
        if (empty($request->reservation_number)) {
            return redirect()->back()->with('error', 'Nomor reservasi harus diisi.');
        }

        if (strlen($request->reservation_number) > 255) {
            return redirect()->back()->with('error', 'Nomor reservasi terlalu panjang.');
        }

        if (empty($request->reservation_date)) {
            return redirect()->back()->with('error', 'Tanggal reservasi harus diisi.');
        }

        if (!strtotime($request->reservation_date)) {
            return redirect()->back()->with('error', 'Format tanggal reservasi tidak valid.');
        }

        if (empty($request->reservation_time)) {
            return redirect()->back()->with('error', 'Jam reservasi harus diisi.');
        }

        if (empty($request->service)) {
            return redirect()->back()->with('error', 'Layanan harus dipilih.');
        }

        if (empty($request->doctor)) {
            return redirect()->back()->with('error', 'Dokter harus dipilih.');
        }

        if (empty($request->practice_time)) {
            return redirect()->back()->with('error', 'Waktu praktek harus dipilih.');
        }

        if (!in_array($request->practice_time, ['PAGI', 'SIANG'])) {
            return redirect()->back()->with('error', 'Waktu praktek tidak valid.');
        }

        if (empty($request->patient_name)) {
            return redirect()->back()->with('error', 'Nama pasien harus diisi.');
        }

        if (empty($request->phone)) {
            return redirect()->back()->with('error', 'Nomor telepon harus diisi.');
        }

        if (!preg_match('/^[0-9]+$/', $request->phone)) {
            return redirect()->back()->with('error', 'Nomor telepon harus berupa angka.');
        }

        if (empty($request->room)) {
            return redirect()->back()->with('error', 'Ruangan harus diisi.');
        }

        if (empty($request->type)) {
            return redirect()->back()->with('error', 'Tipe harus diisi.');
        }
        // Update reservasi yang ada
        $reservation = PatientReservation::findOrfail($request->id_reservation);
        $reservation->id_doctor = $request->doctor;
        $reservation->id_patient = $request->id_patient;
        $reservation->reservation_number = $reservation->reservation_number;
        $reservation->reservation_date = $request->reservation_date;
        $reservation->reservation_time = $request->reservation_time;
        $reservation->service = $request->service;
        $reservation->practice_time = $request->practice_time;
        $reservation->room = $request->room;
        $reservation->type = $request->type;
        $reservation->notes = $request->edit_notes;
        $test = $reservation->save();

        return redirect()->back()->with('success', 'Reservasi berhasil diperbarui.');
    }
}
