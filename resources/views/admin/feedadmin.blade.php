@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800">Ulasan Pelanggan</h1>
        <button class="btn btn-success" onclick="sendWhatsApp()">Kirim WhatsApp</button>
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Ulasan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Rating</th>
                            <th>Komentar</th>
                            <th>Dibuat Pada</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feedbacks as $index => $feedback)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $feedback->rating ? 'text-warning' : 'text-gray-300' }}"></i>
                                @endfor
                            </td>
                            <td>{{ $feedback->comment ?? 'Tidak ada komentar' }}</td>
                            <td>{{ $feedback->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function sendWhatsApp() {
        let phoneNumber = prompt("Masukkan nomor pelanggan (contoh: 6281234567890):");

        if (phoneNumber) {
            let message = "Tolong beri ulasan pelayanan kami: {{ route('feedback.index') }}";
            let url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;

            window.open(url, '_blank');
        }
    }
</script>

@endsection
