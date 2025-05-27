<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;

class AdminChat extends Component
{
    public $message;
    public $messages;
    public $userId;

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->loadMessages();
    }

    public function loadMessages()
    {
        $this->messages = Message::with('sender')
            ->where(function($query) {
                $query->where(function($q) {
                    $q->where('from_id', auth()->id())
                      ->where('to_id', $this->userId);
                })->orWhere(function($q) {
                    $q->where('from_id', $this->userId)
                      ->where('to_id', auth()->id());
                });
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
            'to_id' => $this->userId
        ]);

        $this->message = '';
        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.admin-chat');
    }
}
