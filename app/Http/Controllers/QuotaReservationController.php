<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotas;

class QuotaReservationController extends Controller
{
    public function store(Request $request)
    {
        // Ambil input dari request
        $service_name = $request->input('service_name');
        $doctor_name = $request->input('doctor_name');
        $practice_time = $request->input('practice_time');
        $type = $request->input('type');
        $day = $request->input('day');
        $quota = $request->input('max-reservation'); // Sesuaikan nama input untuk kuota

        // Validasi input menggunakan if-else
        if (empty($service_name)) {
            return redirect()->back()->with('error', 'Layanan harus diisi.');
        }

        if (empty($doctor_name)) {
            return redirect()->back()->with('error', 'Dokter harus dipilih.');
        }

        if (empty($practice_time)) {
            return redirect()->back()->with('error', 'Praktek harus diisi.');
        }

        if (empty($type)) {
            return redirect()->back()->with('error', 'Jenis harus diisi.');
        }

        if (empty($day)) {
            return redirect()->back()->with('error', 'Hari harus diisi.');
        }

        if (empty($quota) || !is_numeric($quota)) {
            return redirect()->back()->with('error', 'Kuota harus diisi dan harus berupa angka.');
        }

        // Simpan data jika semua validasi berhasil
        $quotaRecord = new Quotas();
        $quotaRecord->service_name = $service_name;
        $quotaRecord->id_doctor = $doctor_name;
        $quotaRecord->practice_time = $practice_time;
        $quotaRecord->type = $type;
        $quotaRecord->day = $day;
        $quotaRecord->quota = $quota; // Sesuaikan dengan nama input
        $quotaRecord->save();

        return redirect()->back()->with('success', 'Data jadwal dokter berhasil ditambahkan.');
    }

    public function update(Request $request)
    {
        $id_quota = $request->input('id_quota');
        $quotaRecord = Quotas::find($id_quota);

        if (!$quotaRecord) {
            return redirect()->back()->with('error', 'Data jadwal dokter tidak ditemukan.');
        }

        // Ambil input dari request
        $service_name = $request->input('service_name');
        $doctor_name = $request->input('doctor_name');
        $practice_time = $request->input('practice_time');
        $type = $request->input('type');
        $day = $request->input('day');
        $quota = $request->input('edit_max-reservation'); // Sesuaikan nama input untuk kuota

        // Validasi input menggunakan if-else
        if (empty($service_name)) {
            return redirect()->back()->with('error', 'Layanan harus diisi.');
        }

        if (empty($doctor_name)) {
            return redirect()->back()->with('error', 'Dokter harus dipilih.');
        }

        if (empty($practice_time)) {
            return redirect()->back()->with('error', 'Praktek harus diisi.');
        }

        if (empty($type)) {
            return redirect()->back()->with('error', 'Jenis harus diisi.');
        }

        if (empty($day)) {
            return redirect()->back()->with('error', 'Hari harus diisi.');
        }

        if (empty($quota) || !is_numeric($quota)) {
            return redirect()->back()->with('error', 'Kuota harus diisi dan harus berupa angka.');
        }

        // Update data jika semua validasi berhasil
        $quotaRecord->service_name = $service_name;
        $quotaRecord->id_doctor = $doctor_name;
        $quotaRecord->practice_time = $practice_time;
        $quotaRecord->type = $type;
        $quotaRecord->day = $day;
        $quotaRecord->quota = $quota;
        $quotaRecord->save();

        return redirect()->back()->with('success', 'Data jadwal dokter berhasil diperbarui.');
    }
}
