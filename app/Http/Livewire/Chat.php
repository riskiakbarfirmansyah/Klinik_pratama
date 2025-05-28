<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;

class Chat extends Component
{
    public $message;
    public $messages;

    public function mount()
    {
        $this->loadMessages();
    }

    public function loadMessages()
    {
        $this->messages = Message::with('sender')
            ->where(function ($query) {
                $query->where('from_id', auth()->id())
                    ->orWhere('to_id', auth()->id());
            })
            ->orderBy('created_at', 'asc')
            ->get();
    }

    public function sendMessage()
    {
        $this->validate([
            'message' => 'required|string|min:1'
        ], [
            'message.required' => 'Pesan tidak boleh kosong',
            'message.min' => 'Pesan terlalu pendek'
        ]);

        Message::create([
            'content' => $this->message,
            'from_id' => auth()->id(),
            'to_id' => 1 // ID admin
        ]);

        $this->message = '';
        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
