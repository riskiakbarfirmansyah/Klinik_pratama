<div class="d-flex flex-column h-100" style="height: 100%;">
    <!-- Chat Header -->
    <div class="d-flex align-items-center px-4 py-3 border-bottom bg-white shadow-sm" style="min-height:64px;">
        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width:40px;height:40px;font-weight:bold;font-size:1.2rem;">
            {{ substr($messages->first()?->sender->name ?? '', 0, 1) }}
        </div>
        <div class="ml-3">
            <div class="font-weight-bold">{{ $messages->first()?->sender->name ?? 'Chat' }}</div>
            <div class="small text-muted">{{ $messages->first()?->sender->email ?? '' }}</div>
        </div>
    </div>

    <!-- Messages Area -->
    <div class="flex-grow-1 overflow-auto px-4 py-3" wire:poll="loadMessages" id="messages-area" style="background:#f4f7fa;">
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
    <div class="border-top bg-white px-3 py-2">
        <form wire:submit.prevent="sendMessage" class="d-flex align-items-center">
            <input type="text"
                   wire:model.defer="message"
                   class="form-control rounded-pill mr-2"
                   placeholder="Ketik pesan anda..." autocomplete="off"
                   style="height:44px;">
            <button type="submit"
                    class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center"
                    style="width:44px;height:44px;">
                <i class="fas fa-paper-plane"></i>
            </button>
        </form>
    </div>
</div>

@push('scripts')
@endpush

<style>
/* Custom scrollbar for chat */
#messages-area::-webkit-scrollbar {
    width: 8px;
    background: #f4f7fa;
}
#messages-area::-webkit-scrollbar-thumb {
    background: #e1e4ea;
    border-radius: 4px;
}
</style>
