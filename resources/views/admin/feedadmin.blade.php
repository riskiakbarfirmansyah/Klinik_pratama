@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800">Ulasan Pelanggan</h1>
        <button class="btn btn-success" onclick="openWhatsAppModal()">Kirim WhatsApp</button>
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
                            <th>Nama Dokter</th>
                            <th>Rating</th>
                            <th>Komentar</th>
                            <th>Dibuat Pada</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feedbacks as $index => $feedback)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $feedback->dokter->nama ?? 'Dokter tidak ditemukan' }}</td>
                            <td>{{ $feedback->rating }} / 10</td>
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

<!-- Custom WhatsApp Modal -->
<div class="modal fade" id="whatsappModal" tabindex="-1" role="dialog" aria-labelledby="whatsappModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="whatsappModalLabel">
                    <i class="fab fa-whatsapp mr-2"></i> Kirim WhatsApp
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="phoneNumber">Masukkan nomor pelanggan:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+</span>
                        </div>
                        <input type="text" class="form-control" id="phoneNumber" placeholder="Contoh: 628123456789">
                    </div>
                    <small class="form-text text-muted">Format nomor: kode negara + nomor (tanpa tanda +)</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">
                    <i class="fas fa-times mr-1"></i> Batal
                </button>
                <button type="button" class="btn btn-success" onclick="sendWhatsApp()">
                    <i class="fas fa-paper-plane mr-1"></i> Kirim
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function openWhatsAppModal() {
        $('#whatsappModal').modal('show');
    }
    
    function sendWhatsApp() {
        let phoneNumber = document.getElementById('phoneNumber').value.trim();

        if (phoneNumber) {
            // Mendapatkan URL rating page
            let ratingUrl = "{{ route('feedback.index') }}";
            
            // Membuat pesan yang menarik dengan emoji dan format
            let message = `*✨ KAMI MENGHARGAI PENDAPAT ANDA! ✨*\n\n`;
            message += `Terima kasih telah mempercayakan kesehatan Anda kepada kami! 🙏\n\n`;
            message += `Bagaimana pengalaman Anda dengan layanan kami? Pendapat Anda sangat berarti untuk meningkatkan kualitas pelayanan kami.\n\n`;
            message += `Klik tombol di bawah untuk memberikan ulasan:\n\n`;
            message += `🌟 *BERI ULASAN SEKARANG* 🌟\n`;
            message += `${ratingUrl}`;

            // Encode the message for the URL
            let encodedMessage = encodeURIComponent(message);
            
            // Create a WhatsApp URL that pre-fills the message
            let url = `https://wa.me/${phoneNumber}?text=${encodedMessage}&app_absent=0`;

            window.open(url, '_blank');
            $('#whatsappModal').modal('hide');
        } else {
            // Tampilkan pesan error jika nomor tidak diisi
            alert('Silakan masukkan nomor pelanggan!');
        }
    }
    
    // Tambahkan event listener untuk tombol Enter pada input nomor
    document.getElementById('phoneNumber').addEventListener('keyup', function(event) {
        if (event.key === 'Enter') {
            sendWhatsApp();
        }
    });
</script>

<style>
    .modal-content {
        border-radius: 10px;
        border: none;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }
    
    .modal-header {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        background-color: #3EB8BE !important;
    }
    
    .input-group-text {
        background-color: #3EB8BE;
        color: white;
        border: 1px solid #3EB8BE;
    }
    
    .btn-success {
        background-color: #3EB8BE !important;
        border-color: #3EB8BE !important;
    }
    
    .btn-success:hover {
        background-color: #2a9599 !important;
        border-color: #2a9599 !important;
    }
    
    .close:focus {
        outline: none;
    }
</style>
@endsection