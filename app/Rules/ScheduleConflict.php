<?php

namespace App\Rules;

use App\Models\Dokter;
use Illuminate\Contracts\Validation\Rule;

class ScheduleConflict implements Rule
{
    protected $doctorId;
    protected $errorMessage;

    public function __construct($doctorId = null)
    {
        $this->doctorId = $doctorId;
    }

    public function passes($attribute, $value)
    {
        $selectedScheduleId = $value;
        $selectedPoliId = request()->Spesialis;

        // Validasi hanya jika ada jadwal dan poli
        if (!$selectedScheduleId || !$selectedPoliId) {
            return true; // Tidak bisa validasi tanpa data ini
        }

        $doctorWithSameSchedule = Dokter::where('jadwalpraktek', $selectedScheduleId)
            ->where('id_poli', $selectedPoliId)
            ->when($this->doctorId, function ($query) {
                return $query->where('id', '!=', $this->doctorId);
            })
            ->first();

        if ($doctorWithSameSchedule) {
            $this->errorMessage = 'Jadwal ini sudah digunakan oleh dokter: ' . $doctorWithSameSchedule->nama . ' di poli yang sama.';
            return false;
        }

        return true;
    }

    public function message()
    {
        return $this->errorMessage ?? 'Jadwal praktek sudah digunakan oleh dokter lain pada poli yang sama.';
    }
}