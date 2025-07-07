<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class DoctorList extends Component
{
    public $selectedDoctor = null;

    public function mount()
    {
        // Set dokter pertama sebagai default jika belum ada yang dipilih
        if (!$this->selectedDoctor) {
            $firstDoctor = User::where('is_dokter', true)->first();
            if ($firstDoctor) {
                $this->selectDoctor($firstDoctor->id);
            }
        }
    }

    public function selectDoctor($doctorId)
    {
        $this->selectedDoctor = $doctorId;
        $this->emit('doctorSelected', $doctorId);
    }

    public function render()
    {
        $doctors = User::where('is_dokter', true)->get();
        return view('livewire.doctor-list', [
            'doctors' => $doctors
        ]);
    }
}
