<div class="d-flex flex-column h-100" style="height:100%; overflow:hidden;">
    <!-- Chat Header -->
    <div class="d-flex align-items-center px-4 py-3 border-bottom bg-white shadow-sm" style="min-height:64px;">
        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width:40px;height:40px;font-weight:bold;font-size:1.2rem;">
            {{ $selectedDoctor ? substr($selectedDoctor->name, 0, 1) : 'D' }}
        </div>
        <div class="ml-3">
            <div class="font-weight-bold">{{ $selectedDoctor ? $selectedDoctor->name : 'Pilih Dokter' }}</div>
            <div class="small text-muted">{{ $selectedDoctor ? 'Dokter Klinik Pratama' : 'Silakan pilih dokter untuk memulai chat' }}</div>
        </div>
    </div>

    <!-- Messages Container -->
    <div class="messages-container">
        <!-- Messages Area -->
        <div class="flex-grow-1 overflow-auto px-4 py-3"
             wire:poll.1s="loadMessages"
             id="messages-area"
             style="background:#f4f7fa; min-height:0; max-width:100%;">
            @if($messages && count($messages) > 0)
                @foreach($messages as $msg)
                    <div class="d-flex mb-3 {{ $msg->from_id === auth()->id() ? 'justify-content-end' : 'justify-content-start' }}">
                        <div class="p-3 rounded-lg position-relative"
                            style="
                                max-width: 70%;
                                background: {{ $msg->from_id === auth()->id() ? '#4e73df' : '#fff' }};
                                color: {{ $msg->from_id === auth()->id() ? '#fff' : '#222' }};
                                box-shadow: 0 1px 2px rgba(0,0,0,0.04);
                                border-bottom-{{ $msg->from_id === auth()->id() ? 'right' : 'left' }}-radius: 0.5rem;
                            ">
                            <div class="text-break" style="word-break:break-word;">{{ $msg->content }}</div>
                            <div class="text-right small mt-2" style="opacity:.6;">
                                {{ $msg->created_at->format('H:i') }}
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center text-muted py-5">
                    <i class="fas fa-comments fa-3x mb-3"></i>
                    <div>Belum ada pesan</div>
                </div>
            @endif
        </div>

        <!-- Message Input -->
        <div class="input-container">
            <form wire:submit.prevent="sendMessage" class="d-flex align-items-center">
                <input type="text"
                       wire:model.defer="message"
                       class="form-control rounded-pill mr-2"
                       placeholder="Ketik pesan anda..."
                       autocomplete="off"
                       style="height:44px;">
                <button type="submit"
                        class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center"
                        style="width:44px;height:44px;flex-shrink:0;">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    // Auto scroll ke pesan terbaru
    document.addEventListener('livewire:load', function () {
        Livewire.on('messageSent', function () {
            const messagesArea = document.getElementById('messages-area');
            messagesArea.scrollTop = messagesArea.scrollHeight;
        });
    });

    // Scroll to bottom when messages are loaded
    window.addEventListener('scrollToBottom', function() {
        const messagesArea = document.getElementById('messages-area');
        messagesArea.scrollTop = messagesArea.scrollHeight;
    });
</script>

<style>
#messages-area::-webkit-scrollbar {
    width: 8px;
    background: #f4f7fa;
}
#messages-area::-webkit-scrollbar-thumb {
    background: #e1e4ea;
    border-radius: 4px;
}

/* Tambahan style untuk memastikan input selalu terlihat */
.input-container {
    z-index: 10;
    background: white;
}

.btn-primary {
    min-width: 44px; /* Tambahkan ini */
    min-height: 44px; /* Tambahkan ini */
}

/* Pastikan area pesan bisa di-scroll */
.messages-container {
    display: flex;
    flex-direction: column;
    height: 100%;
    overflow: hidden;
    width: 100%;
    max-width: 100%;
}

#messages-area {
    flex: 1;
    overflow-y: auto;
    overflow-x: hidden;
    width: 100%;
}

.input-container {
    flex-shrink: 0;
    width: 100%;
    background: white;
    border-top: 1px solid #e3e6f0;
    padding: 1rem;
    position: relative;
    bottom: 0;
}
</style>
