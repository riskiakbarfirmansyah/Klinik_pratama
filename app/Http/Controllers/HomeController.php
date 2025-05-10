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
        $dokter = Dokter::all();
        $jadwalvariabel = Jadwal::all();
        return view('index', [
            'dokter' => $dokter, 
            'jadwalvariabel' => $jadwalvariabel
        ]);
    }
}
