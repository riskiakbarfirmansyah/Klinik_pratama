<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwalvariabel = Jadwal::get();
        return view('jadwal', compact('jadwalvariabel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jadwal-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $this->validate($request, [
    'hari' => 'required',
    'jam_mulai' => 'required|date_format:H:i',
    'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
    ], [
    'hari.required' => 'Hari wajib diisi.',
    'jam_mulai.required' => 'Jam mulai wajib diisi.',
    'jam_mulai.date_format' => 'Format jam mulai harus HH:MM.',
    'jam_selesai.required' => 'Jam selesai wajib diisi.',
    'jam_selesai.date_format' => 'Format jam selesai harus HH:MM.',
    'jam_selesai.after' => 'Jam selesai harus lebih besar dari jam mulai.',
    ]);


    Jadwal::create([
        'day' => $request->hari,
        'hour' => $request->jam_mulai . ' - ' . $request->jam_selesai,
        'jadwalpraktek' => $request->hari . ' - ' . $request->jam_mulai . ' - ' . $request->jam_selesai,
    ]);

    return redirect('/jadwal')->with('success', 'Jadwal berhasil ditambahkan');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwalvariabel
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwalvariabel)
    {
        $jadwalvariabel = Jadwal::where('id', $jadwalvariabel)->get();
        return view('jadwal', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal = Jadwal::findOrfail($id);
        return view('jadwal-form-edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
     $this->validate($request, [
    'hari' => 'required',
    'jam_mulai' => 'required|date_format:H:i',
    'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
    ], [
    'hari.required' => 'Hari wajib diisi.',
    'jam_mulai.required' => 'Jam mulai wajib diisi.',
    'jam_mulai.date_format' => 'Format jam mulai harus HH:MM.',
    'jam_selesai.required' => 'Jam selesai wajib diisi.',
    'jam_selesai.date_format' => 'Format jam selesai harus HH:MM.',
    'jam_selesai.after' => 'Jam selesai harus lebih besar dari jam mulai.',
    ]);

    $jadwal = Jadwal::findOrFail($id);
    $jadwal->update([
        'day' => $request->hari,
        'hour' => $request->jam_mulai . ' - ' . $request->jam_selesai,
        'jadwalpraktek' => $request->hari . ' - ' . $request->jam_mulai . ' - ' . $request->jam_selesai,
    ]);

    return redirect()->route('jadwal.index')->with('success', 'Jadwal telah diubah');
}
    
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\Jadwal  $pasien
      * @return \Illuminate\Http\Response
      */
     public function destroy(Jadwal $jadwal)
     {
         $jadwal->delete();
         return redirect()->back();
     }
}
