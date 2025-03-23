<?php

namespace App\Http\Controllers;

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
        return view('rating');
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
            'rating' => 'required|integer|min:1|max:5',
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
            'comment' => $request->comment,
            // Tambahkan user_id jika ada sistem login
            // 'user_id' => auth()->id(),
        ]);

        return redirect()->route('feedback.thank-you')
            ->with('success', 'Terima kasih atas feedback Anda!');
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
}