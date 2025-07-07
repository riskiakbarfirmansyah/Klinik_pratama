<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\User;

class Chat extends Component
{
    public $message;
    public $messages;
    public $selectedDoctorId;

    protected $listeners = ['doctorSelected' => 'setSelectedDoctor'];

    public function mount()
    {
        // Set dokter pertama sebagai default
        $this->selectedDoctorId = User::where('is_dokter', true)->first()?->id;
        $this->loadMessages();
    }

    public function setSelectedDoctor($doctorId)
    {
        $this->selectedDoctorId = $doctorId;
        $this->loadMessages();
    }

    public function loadMessages()
    {
        if (!$this->selectedDoctorId) return;

        $this->messages = Message::with('sender')
            ->where(function ($query) {
                $query->where(function($q) {
                    $q->where('from_id', auth()->id())
                      ->where('to_id', $this->selectedDoctorId);
                })->orWhere(function($q) {
                    $q->where('from_id', $this->selectedDoctorId)
                      ->where('to_id', auth()->id());
                });
            })
            ->orderBy('created_at', 'asc')
            ->get();
    }

    public function sendMessage()
    {
        if (!$this->selectedDoctorId) {
            session()->flash('error', 'Pilih dokter terlebih dahulu');
            return;
        }

        $this->validate([
            'message' => 'required|string|min:1'
        ], [
            'message.required' => 'Pesan tidak boleh kosong',
            'message.min' => 'Pesan terlalu pendek'
        ]);

        Message::create([
            'content' => $this->message,
            'from_id' => auth()->id(),
            'to_id' => $this->selectedDoctorId
        ]);

        $this->message = '';
        $this->loadMessages();
    }

    public function render()
    {
        $selectedDoctor = User::find($this->selectedDoctorId);
        return view('livewire.chat', [
            'selectedDoctor' => $selectedDoctor
        ]);
    }
}
