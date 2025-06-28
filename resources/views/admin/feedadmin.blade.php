@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <!-- Judul dan Tombol Kirim WhatsApp -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800">Ulasan Pelanggan</h1>
        <button class="btn btn-success" onclick="openWhatsAppModal()">Kirim WhatsApp</button>
    </div>

    <!-- Checkbox untuk Menampilkan Ulasan yang Diarsipkan -->
    <div class="mb-4">
        <label for="showArchived">
            <input type="checkbox" id="showArchived" onclick="filterFeedback()" {{ old('showArchived') ? 'checked' : '' }}>
            Lihat Arsip
        </label>
    </div>

    <!-- Tabel Daftar Ulasan -->
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feedbacks as $index => $feedback)
                        <tr class="{{ $feedback->is_archived ? 'archived' : '' }}">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $feedback->dokter->nama ?? 'Dokter tidak ditemukan' }}</td>
                            <td>{{ $feedback->rating }} / 10</td>
                            <td>{{ $feedback->comment ?? 'Tidak ada komentar' }}</td>
                            <td>{{ $feedback->created_at->format('d M Y H:i') }}</td>
                            <td>
                                @if(!$feedback->is_archived)
                                <button type="button" class="btn btn-warning btn-sm" onclick="confirmArchive({{ $feedback->id }}, '{{ $feedback->dokter->nama ?? 'Dokter tidak ditemukan' }}')">
                                    <i class="fas fa-archive"></i> Arsip
                                </button>
                                @else
                                <span class="badge badge-secondary">Diarsipkan</span>
                                @endif
                            </td>
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

<!-- Archive Confirmation Modal -->
<div class="modal fade" id="archiveModal" tabindex="-1" role="dialog" aria-labelledby="archiveModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="archiveModalLabel">
                    <i class="fas fa-archive mr-2"></i> Konfirmasi Arsip
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin mengarsipkan ulasan untuk dokter <strong id="doctorName"></strong>?</p>
                <p class="text-muted small">Tindakan ini tidak akan menampilkan ulasan dalam daftar ulasan aktif.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times mr-1"></i> Batal
                </button>
                <form id="archiveForm" method="POST" style="display: inline;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-archive mr-1"></i> Arsipkan
                    </button>
                </form>
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

    function confirmArchive(feedbackId, doctorName) {
        // Set doctor name in the modal
        document.getElementById('doctorName').textContent = doctorName;
        
        // Set the form action URL
        document.getElementById('archiveForm').action = `/admin/feedback/archive/${feedbackId}`;
        
        // Show the modal
        $('#archiveModal').modal('show');
    }

    function filterFeedback() {
        var showArchived = document.getElementById('showArchived').checked;
        var rows = document.querySelectorAll('tbody tr');

        rows.forEach(function(row) {
            var isArchived = row.classList.contains('archived');
            if (showArchived || !isArchived) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // On page load, filter based on checkbox state (if checked or not)
    document.addEventListener('DOMContentLoaded', function() {
        filterFeedback();
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
    }

    .modal-header.bg-success {
        background-color: #3EB8BE !important;
    }

    .modal-header.bg-warning {
        background-color: #f39c12 !important;
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

    .btn-warning {
        background-color: #f39c12 !important;
        border-color: #f39c12 !important;
    }

    .btn-warning:hover {
        background-color: #e67e22 !important;
        border-color: #e67e22 !important;
    }

    .btn-danger:hover {
        background-color: #c9302c !important;
        border-color: #ac2925 !important;
    }

    .close:focus {
        outline: none;
    }

    .table td {
        vertical-align: middle;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }
</style>
@endsection
