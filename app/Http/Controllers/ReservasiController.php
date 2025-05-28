<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Reservasi; // Model jika kamu simpan ke database

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasi = Reservasi::latest()->get();
        return view('antrian-homecare', compact('reservasi'));
    }


    public function process(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'poliklinik' => 'required|string|max:255',
            'dokter' => 'required|string|max:255',
            'jaminan' => 'required|in:umum,asuransi',
            'tanggal_booking' => 'required|date',
            'jam_praktek' => 'required|string',
            'jam_kedatangan' => 'required|string',
            'keluhan' => 'required|string|max:255',
            'pernyataan' => 'accepted'
        ]);

        // Simpan ke database (jika ada model Reservasi)
        Reservasi::create($validated);

        // Redirect atau response
        return redirect()->route('antrian.homecare')->with('success', 'Reservasi berhasil dikirim!');
    }
    
}
