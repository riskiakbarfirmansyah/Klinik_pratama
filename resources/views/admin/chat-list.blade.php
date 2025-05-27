@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Users List -->
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Percakapan</h6>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @foreach($users as $chatUser)
                        <a href="{{ route('admin.chat.list', ['user_id' => $chatUser->id]) }}"
                           class="list-group-item list-group-item-action d-flex align-items-center p-3
                           {{ request()->query('user_id') == $chatUser->id ? 'active' : '' }}">
                            <div class="mr-3">
                                <div class="avatar-circle">
                                    {{ substr($chatUser->name, 0, 1) }}
                                </div>
                            </div>
                            <div>
                                <h6 class="mb-1">{{ $chatUser->name }}</h6>
                                <small class="text-muted">{{ $chatUser->email }}</small>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Chat Area -->
        <div class="col-md-8">
            <div class="card shadow">
                @if(request()->has('user_id'))
                    @livewire('admin-chat', ['userId' => request()->query('user_id')])
                @else
                    <div class="card-body">
                        <div class="text-center py-5">
                            <i class="fas fa-comments fa-3x text-gray-300 mb-3"></i>
                            <p>Pilih percakapan untuk memulai chat</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
.avatar-circle {
    width: 40px;
    height: 40px;
    background-color: #4e73df;
    border-radius: 50%;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

/* Style untuk card yang berisi chat */
.card {
    height: calc(100vh - 200px);
    display: flex;
    flex-direction: column;
}

/* Style untuk area pesan */
.messages-area {
    flex: 1;
    overflow-y: auto;
}

/* Style untuk form input pesan */
.message-input {
    border-top: 1px solid #e3e6f0;
    padding: 1rem;
    background: white;
}
</style>

@push('scripts')
<script>
    // Auto scroll ke pesan terbaru
    const messagesContainer = document.querySelector('.messages-area');
    if (messagesContainer) {
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }
</script>
@endpush
@endsection
