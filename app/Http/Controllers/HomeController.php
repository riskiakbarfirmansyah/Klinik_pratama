<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Jadwal;
use App\Models\Pegawai;
use App\Models\Rekam;
use App\Models\Feedback;
use DateTimeInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $today = date("d/m/Y");
        $pasien = Pasien::all();
        $countpasien = Rekam::where('diagnosa', null)->count();
        // Mengambil data rating dari Feedback
        $averageRating = Feedback::avg('rating') ?? 0; // Jika null, default 0
        $totalReviews = Feedback::count();
        
        return view('dashboard', [
            'countpasientoday' => $countpasien,
            'pasien' => $pasien,
            'pegawai' => Pegawai::all(),
            'laporan' => Rekam::where('laporan', 1)->count(),
            'averageRating' => $averageRating,
            'totalReviews' => $totalReviews
        ]);
    }
    
    public function index()
    {
        // Ambil semua dokter beserta relasi poli > layanan dan jadwal
        $dokter = Dokter::with(['poli.layanan', 'jadwal'])->get();

        // Siapkan data yang akan dikirim ke Blade (dokterData)
        $dokterData = $dokter->mapWithKeys(function ($d) {
            return [
                $d->id => [
                    'layanan' => $d->poli && $d->poli->layanan
                        ? $d->poli->layanan->pluck('nama', 'id')
                        : [],
                    'jadwal' => $d->jadwal
                        ? $d->jadwal->hari . ' - ' . $d->jadwal->jam_mulai . ' s/d ' . $d->jadwal->jam_selesai
                        : null
                ]
            ];
        });

        return view('index', [
            'dokter' => $dokter,
            'jadwalvariabel' => Jadwal::all(),
            'dokterData' => $dokterData,
        ]);
    }


    public function prosesReservasi(Request $request)
    {
    // Validasi data bisa ditambahkan di sini
    $data = $request->all();

    // Simpan ke database atau lakukan proses lainnya

    return redirect()->back()->with('success', 'Reservasi berhasil dikirim!');
    }
}
