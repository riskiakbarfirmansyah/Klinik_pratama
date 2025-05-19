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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
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
                    }
                });
            });

            setTimeout(function() {
                window.location.reload();
            }, 16000);
        </script>
    @endpush
@endsection