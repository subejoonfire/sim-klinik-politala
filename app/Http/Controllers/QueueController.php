<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Queues;

class QueueController extends Controller
{
    public function store(Request $request)
    {
        // Ambil data dari request
        $nama_calon_pasien = $request->input('nama_calon_pasien');
        $tanggal = $request->input('tanggal');
        $jam = $request->input('jam');
        $bpjs_no_bpjs = $request->input('bpjs_no_bpjs');
        $antrian = $request->input('antrian');
        $panggil = $request->input('panggil');
        $durasi = $request->input('durasi');
        $status = $request->input('status');

        // Cek apakah semua field sudah diisi
        if (empty($nama_calon_pasien)) {
            return redirect()->back()->with('error', 'Nama Calon Pasien tidak boleh kosong.');
        }

        if (empty($tanggal)) {
            return redirect()->back()->with('error', 'Tanggal tidak boleh kosong.');
        }

        if (empty($jam)) {
            return redirect()->back()->with('error', 'Jam tidak boleh kosong.');
        }

        if (empty($bpjs_no_bpjs)) {
            return redirect()->back()->with('error', 'BPJS/NO BPJS tidak boleh kosong.');
        }

        if (empty($antrian)) {
            return redirect()->back()->with('error', 'Antrian tidak boleh kosong.');
        }

        if (empty($panggil)) {
            return redirect()->back()->with('error', 'Panggil tidak boleh kosong.');
        }

        if (empty($durasi)) {
            return redirect()->back()->with('error', 'Durasi tidak boleh kosong.');
        }

        if (empty($status)) {
            return redirect()->back()->with('error', 'Status tidak boleh kosong.');
        }

        $queue = new Queues();
        $queue->nama_calon_pasien = $nama_calon_pasien;
        $queue->tanggal = $tanggal;
        $queue->jam = $jam;
        $queue->bpjs_no_bpjs = $bpjs_no_bpjs;
        $queue->antrian = $antrian;
        $queue->panggil = $panggil;
        $queue->durasi = $durasi . 'Menit';
        $queue->status = $status;
        $queue->save();

        return redirect()->back()->with('success', 'Data antrian pasien berhasil ditambahkan.');
    }
}
