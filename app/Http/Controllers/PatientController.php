<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function store(Request $request)
    {

        $NoMR = 'MR-' . strtoupper(Str::random(8));
        $mr = $NoMR;
        $tgl_lahir = $request->input('tgl_lahir');
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $telp = $request->input('telp');
        $nama_ibu = $request->input('nama_ibu');
        $nama_ayah = $request->input('nama_ayah');
        $nik = $request->input('nik');
        $no_bpjs = $request->input('no_bpjs');
        $agama = $request->input('agama');

        if (empty($mr) || empty($tgl_lahir) || empty($nama) || empty($alamat) || empty($telp) || empty($nama_ibu) || empty($nama_ayah) || empty($nik) || empty($no_bpjs) || empty($agama)) {
            return back()->with('error', 'Semua field harus diisi!');
        }

        if (!preg_match('/^[0-9]+$/', $telp)) {
            return back()->with('error', 'Telepon harus berupa angka!');
        }

        if (!preg_match('/^[0-9]+$/', $nik)) {
            return back()->with('error', 'NIK harus berupa angka!');
        }

        $patient = new Patients();
        $patient->mr = $mr;
        $patient->tgl_lahir = $tgl_lahir;
        $patient->nama = $nama;
        $patient->alamat = $alamat;
        $patient->telp = $telp;
        $patient->nama_ibu = $nama_ibu;
        $patient->nama_ayah = $nama_ayah;
        $patient->nik = $nik;
        $patient->no_bpjs = $no_bpjs;
        $patient->agama = $agama;
        $patient->save();

        return redirect()->back()->with('success', 'Pasien berhasil ditambahkan!');
    }
    public function update(Request $request)
    {
        $id_patient = $request->input('id_patient');
        $tgl_lahir = $request->input('tgl_lahir');
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $telp = $request->input('telp');
        $nama_ibu = $request->input('nama_ibu');
        $nama_ayah = $request->input('nama_ayah');
        $nik = $request->input('nik');
        $no_bpjs = $request->input('no_bpjs');
        $agama = $request->input('agama');

        if (empty($tgl_lahir) || empty($nama) || empty($alamat) || empty($telp) || empty($nama_ibu) || empty($nama_ayah) || empty($nik) || empty($no_bpjs) || empty($agama)) {
            return back()->with('error', 'Semua field harus diisi!');
        }

        if (!preg_match('/^[0-9]+$/', $telp)) {
            return back()->with('error', 'Telepon harus berupa angka!');
        }

        if (!preg_match('/^[0-9]+$/', $nik)) {
            return back()->with('error', 'NIK harus berupa angka!');
        }

        $patient = Patients::find($id_patient);
        if (!$patient) {
            return back()->with('error', 'Pasien tidak ditemukan!');
        }

        $patient->tgl_lahir = $tgl_lahir;
        $patient->nama = $nama;
        $patient->alamat = $alamat;
        $patient->telp = $telp;
        $patient->nama_ibu = $nama_ibu;
        $patient->nama_ayah = $nama_ayah;
        $patient->nik = $nik;
        $patient->no_bpjs = $no_bpjs;
        $patient->agama = $agama;
        $patient->save();

        return redirect()->back()->with('success', 'Pasien berhasil diupdate!');
    }
}
