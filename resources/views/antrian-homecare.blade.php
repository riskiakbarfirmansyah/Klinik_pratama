<title>Antrian-Pasien (Jam {{ \Carbon\Carbon::now()->format("H:i") }})</title>
@extends('layouts.main')

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $item)
            <div class="alert alert-danger" role="alert">
                {{ $item }}
            </div>
        @endforeach
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <h1>Data Antrian Homecare</h1>
        <br>

        <div class="table-responsive">
            <table class="table table-flush" id="products-list">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No. HP/WA</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Poliklinik</th>
                        <th>Dokter</th>
                        <th>Jaminan</th>
                        <th>Tanggal Booking</th>
                        <th>Jam Praktek</th>
                        <th>Jam Kedatangan</th>
                        <th>Keluhan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservasi as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->nama_pasien }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->tanggal_lahir }}</td>
                            <td>{{ $item->poliklinik }}</td>
                            <td>{{ $item->dokter }}</td>
                            <td>{{ $item->jaminan }}</td>
                            <td>{{ $item->tanggal_booking }}</td>
                            <td>{{ $item->jam_praktek }}</td>
                            <td>{{ $item->jam_kedatangan }}</td>
                            <td>{{ $item->keluhan }}</td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm delete-btn" 
                                    data-id="{{ $item->id }}"
                                    data-nama="{{ $item->nama_pasien }}"
                                    data-tanggal="{{ $item->tanggal_booking }}"
                                    data-dokter="{{ $item->dokter }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Konfirmasi Delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">
                        <i class="fas fa-exclamation-triangle text-warning mr-2"></i>
                        Konfirmasi Hapus Data
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fas fa-trash-alt text-danger mb-3" style="font-size: 3rem;"></i>
                        <h6 class="mb-3">Apakah Anda yakin ingin menghapus data antrian ini?</h6>
                        <div class="alert alert-info">
                            <strong>Nama Pasien:</strong> <span id="modal-nama"></span><br>
                            <strong>Tanggal Booking:</strong> <span id="modal-tanggal"></span><br>
                            <strong>Dokter:</strong> <span id="modal-dokter"></span>
                        </div>
                        <p class="text-muted">Data yang sudah dihapus tidak dapat dikembalikan.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Batal
                    </button>
                    <form id="deleteForm" method="POST" style="display: inline-block;">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash mr-1"></i>Ya, Hapus Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Simple modal handler without DataTable dependency
            document.addEventListener('DOMContentLoaded', function() {
                // Handle delete button click
                document.querySelectorAll('.delete-btn').forEach(function(button) {
                    button.addEventListener('click', function() {
                        var id = this.getAttribute('data-id');
                        var nama = this.getAttribute('data-nama');
                        var tanggal = this.getAttribute('data-tanggal');
                        var dokter = this.getAttribute('data-dokter');
                        
                        // Set modal content
                        document.getElementById('modal-nama').textContent = nama;
                        document.getElementById('modal-tanggal').textContent = tanggal;
                        document.getElementById('modal-dokter').textContent = dokter;
                        
                        // Set form action - construct URL manually
                        var deleteForm = document.getElementById('deleteForm');
                        var baseUrl = '{{ url("/antrian-homecare") }}';
                        deleteForm.action = baseUrl + '/' + id;
                        
                        // Show modal using Bootstrap
                        if (typeof $ !== 'undefined') {
                            $('#deleteModal').modal('show');
                        } else if (typeof bootstrap !== 'undefined') {
                            var modal = new bootstrap.Modal(document.getElementById('deleteModal'));
                            modal.show();
                        }
                    });
                });

                // Initialize DataTable if jQuery is available
                if (typeof $ !== 'undefined' && typeof $.fn.dataTable !== 'undefined') {
                    try {
                        $('#products-list').DataTable({
                            dom: 'lBfrtip',
                            lengthMenu: [
                                [50, 100, 5, -1],
                                ['50', '100', '5', 'All']
                            ],
                            buttons: [{
                                    extend: 'excel',
                                    text: 'Excel',
                                    messageTop: 'Data Antrian Harian per Tanggal '+'{{ \Carbon\Carbon::now()->format("d-M-Y") }}'
                                },
                                {
                                    extend: 'copy',
                                    text: 'Copy Isi',
                                    messageTop: 'Data Antrian Harian per Tanggal '+'{{ \Carbon\Carbon::now()->format("d-M-Y") }}'
                                },
                            ],
                            language: {
                                "searchPlaceholder": "Cari nama pasien",
                                "zeroRecords": "Tidak ditemukan data yang sesuai",
                                "emptyTable": "Tidak terdapat data di tabel"
                            },
                            columnDefs: [
                                { orderable: false, targets: -1 }
                            ]
                        });
                    } catch(e) {
                        console.log('DataTable initialization failed:', e);
                    }
                }
            });

            // Auto reload page
            setTimeout(function() {
                window.location.reload();
            }, 16000);
        </script>
    @endpush
@endsection