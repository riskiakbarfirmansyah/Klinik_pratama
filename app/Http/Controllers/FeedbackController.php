<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    /**
     * Menampilkan formulir feedback.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua data dokter untuk ditampilkan di dropdown
        $dokters = Dokter::all();
        
        return view('rating', compact('dokters'));
    }

    /**
     * Menampilkan halaman admin untuk melihat semua feedback.
     *
     * @return \Illuminate\View\View
     */
    public function admin()
    {
        // Mengambil semua feedback dengan relasi dokter, diurutkan berdasarkan tanggal terbaru
        $feedbacks = Feedback::with('dokter')->orderBy('created_at', 'desc')->get();
        
        return view('admin.feedback', compact('feedbacks'));
    }

    /**
     * Menyimpan feedback baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required|integer|min:1|max:10',
            'dokter_id' => 'required|exists:dokters,id', // Tambahkan validasi dokter_id
            'comment' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Membuat record feedback baru
        Feedback::create([
            'rating' => $request->rating,
            'dokter_id' => $request->dokter_id, // Simpan dokter_id
            'comment' => $request->comment,
            // Tambahkan user_id jika ada sistem login
            // 'user_id' => auth()->id(),
        ]);

        return redirect()->route('feedback.thank-you')
            ->with('success', 'Terima kasih atas feedback Anda!');
    }

    /**
     * Menghapus feedback dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            // Cari feedback berdasarkan ID
            $feedback = Feedback::findOrFail($id);
            
            // Simpan nama dokter untuk pesan sukses
            $doctorName = $feedback->dokter->nama ?? 'Dokter tidak ditemukan';
            
            // Hapus feedback
            $feedback->delete();
            
            return redirect()->back()
                ->with('success', "Ulasan untuk dokter {$doctorName} berhasil dihapus.");
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus ulasan. Silakan coba lagi.');
        }
    }

    /**
     * Menampilkan halaman terima kasih setelah submit feedback.
     *
     * @return \Illuminate\View\View
     */
    public function thankYou()
    {
        return view('feedback.thank-you');
    }

    public function archive($id)
    {
        // Cari feedback berdasarkan ID
        $feedback = Feedback::findOrFail($id);

        // Set feedback menjadi diarsipkan
        $feedback->is_archived = true;
        $feedback->save();

        // Mendapatkan semua feedback yang sudah diarsipkan dan yang tidak
        $feedbacks = Feedback::all();  // Mengambil semua data, baik yang diarsipkan maupun yang tidak

        // Mengarahkan langsung ke tampilan feedadmin setelah pengarsipan berhasil
        return view('admin.feedadmin', compact('feedbacks'))->with('success', 'Ulasan berhasil diarsipkan.');
    }
}