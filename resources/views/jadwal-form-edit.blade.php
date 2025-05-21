<title>Ubah Jadwal</title>
@include('partials.navdashboard')

@if ($errors->any())
    @foreach ($errors->all() as $item)
        <div class="alert alert-danger" role="alert">
            {{ $item }}
        </div>
    @endforeach
@endif  

<div class="container">
    <h1>Perubahan Jadwal</h1>
    <br>
    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Hari -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hari</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="hari" value="{{ old('hari', $jadwal->hari) }}">
            </div>
        </div>

        @php
            $jam = explode(' - ', $jadwal->hour);
            $jam_mulai = $jam[0] ?? '';
            $jam_selesai = $jam[1] ?? '';
        @endphp

        <!-- Jam Mulai -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jam Mulai</label>
            <div class="col-sm-5">
                <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ old('jam_mulai', $jam_mulai) }}">
                @error('jam_mulai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Jam Selesai -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jam Selesai</label>
            <div class="col-sm-5">
                <input type="time" class="form-control @error('jam_selesai') is-invalid @enderror" name="jam_selesai" value="{{ old('jam_selesai', $jam_selesai) }}">
                @error('jam_selesai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="/jadwal" class="btn btn-warning">Batal</a>
            </div>
        </div>
    </form>
</div>
