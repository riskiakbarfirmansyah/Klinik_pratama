<title>Jadwal Praktek</title>
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
        <h1>Semua Jadwal Praktek</h1>
        <br>

        <a href="/jadwal/create" type="button" class="btn btn-success">
            <i class="fas fa-plus text-white"></i> <i class="fas fa-calendar text-white"></i> Tambah Jadwal Praktek
        </a>

        <div class="table-responsive mt-3">
            <table class="table table-flush" id="products-list">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwalvariabel as $jp)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jp->day }}</td>
                            <td>{{ $jp->hour }}</td>
                            <td class="text-sm">
                                <a href="{{ route('jadwal.edit', $jp->id) }}" class="btn btn-warning">
                                    <i class="fas fa-pen text-white"></i>
                                </a>

                               @if(auth()->check() && auth()->user()->is_admin === 1)
                                    <form action="{{ route('jadwal.destroy', $jp->id) }}" method="POST" style="display:inline;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"
                                            onClick="return confirm('Yakin ingin hapus jadwal?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

                                @endif
                            </td>
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
                    lengthMenu: [
                        [10, 100, -1],
                        ['10', '100', 'All']
                    ],
                    language: {
                        "searchPlaceholder": "Cari jadwal",
                        "zeroRecords": "Tidak ditemukan jadwal",
                        "emptyTable": "Tidak terdapat jadwal di tabel"
                    }
                });
            });
        </script>
    @endpush
@endsection
